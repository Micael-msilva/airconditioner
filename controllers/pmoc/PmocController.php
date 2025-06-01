<?php
require_once __DIR__ . '/../../utils/Connection.php';
require_once __DIR__ . '/../../model/Pmoc.php';
require_once __DIR__ . '/../../dao/PmocDao.php';
require_once __DIR__ . '/../../model/AirConditioner.php';
require_once __DIR__ . '/../../dao/AirConditionerDao.php';
require_once __DIR__ . '/../../model/Client.php';
require_once __DIR__ . '/../../dao/ClientDao.php';

class PmocController {

    public function createPmoc(array $postData) {
        // Validação básica
        if (empty($postData['name']) || empty($postData['client_name'])) {
            throw new Exception("Nome do PMOC e do Cliente são obrigatórios.");
        }

        // Criar cliente
        $client = new Client($postData['client_name'], $postData['client_phone'], null);
        $clientId = ClientDao::addClient($client);

        // Criar PMOC
        $pmoc = new Pmoc(
            null,
            $postData['name'],
            $postData['creation_date'],
            $postData['service_address'] ?? '',
            80204294924,
            $clientId
        );
        $pmocId = PmocDao::addPmoc($pmoc);

        // Criar ar-condicionados
        foreach ($postData['airconditioners'] as $index => $value) {
            if ($index % 4 == 0) {
                $airConditioner = new AirConditioner(
                    null,
                    $postData['airconditioners'][$index],
                    $postData['airconditioners'][$index + 1],
                    $postData['airconditioners'][$index + 2],
                    $postData['airconditioners'][$index + 3],
                    $pmocId
                );
                AirConditionerDao::addAirConditioner($airConditioner);
            }
        }

        // Depois pode redirecionar ou retornar algo
        header('Location: /pmoc.php');
        exit;
    }
}
