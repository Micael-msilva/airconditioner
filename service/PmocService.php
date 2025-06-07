<?php

require_once __DIR__ . '/../model/Client.php';
require_once __DIR__ . '/../model/Pmoc.php';
require_once __DIR__ . '/../model/AirConditioner.php';
require_once __DIR__ . '/../dao/ClientDao.php';
require_once __DIR__ . '/../dao/PmocDao.php';
require_once __DIR__ . '/../dao/AirConditionerDao.php';

class PmocService {

    public function storePmoc(array $postData) {
        error_log("==== INICIO storePmoc ====");
        error_log("POST DATA: " . print_r($postData, true));      

        if (empty($postData['name']) || empty($postData['client_name'])) {
            error_log("FALTOU nome do PMOC ou do Cliente");
            throw new Exception("Nome do PMOC e do Cliente são obrigatórios.");
        }

        // Criar cliente
        $client = new Client($postData['client_name'], $postData['client_phone'], null);
        $clientId = ClientDao::addClient($client);
        error_log("CLIENTE criado com ID: $clientId");

        // Criar PMOC
        $pmoc = new Pmoc(
            $postData['name'],
            $postData['creation_date'],
            $postData['service_address'] ?? '',
            1,
            $clientId,
            null,
        );
        $pmocId = PmocDao::addPmoc($pmoc);
        error_log("PMOC criado com ID: $pmocId");

        // Criar ar-condicionados
        if (!empty($postData['airconditioners']) && is_array($postData['airconditioners'])) {
            error_log("AIRCONDITIONERS recebidos: " . print_r($postData['airconditioners'], true));
            foreach ($postData['airconditioners'] as $idx => $acData) {
                error_log("Processando AC #$idx: " . print_r($acData, true));
                // Validação simplificada - apenas verificando 'brand'
                if (!empty($acData['brand']) && !empty($acData['btus']) && !empty($acData['description']) && !empty($acData['location'])) {
                    $airConditioner = new AirConditioner(
                        $acData['brand'],
                        $acData['btus'],
                        $acData['description'],
                        $acData['location'],
                        $pmocId,
                        null
                    );
                    error_log("Adicionando AC: " . print_r($airConditioner, true));
                    AirConditionerDao::addAirConditioner($airConditioner);
                } else {
                    error_log("AC #$idx ignorado por falta de dados obrigatórios: " . print_r($acData, true));
                }
            }
        } else {
            error_log("Nenhum ar-condicionado recebido ou formato incorreto.");
        }

        error_log("==== FIM storePmoc ====");
 
    }

    public function getFullFPmocsDetails(int $pmocId) {

        $pmocId = (int) $_GET['id_pmoc'];
        $pmoc = PmocDao::getPmocById($pmocId);

        $clientId = $pmoc->getId_client();
        $client = ClientDao::getClientById($clientId);
        //print_r($client);

        if (!$pmoc) {
            throw new Exception("PMOC não encontrado.");
        }
        
        $airConditioners = AirConditionerDao::getAllAirConditionerByPmocId($pmocId);
        
        include __DIR__ . '/../views/pmoc/pmoc_detail.php';
    }
        
}