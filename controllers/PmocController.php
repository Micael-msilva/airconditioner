<?php
require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/Pmoc.php';
require_once __DIR__ . '/../dao/PmocDao.php';
require_once __DIR__ . '/../model/AirConditioner.php';
require_once __DIR__ . '/../dao/AirConditionerDao.php';
require_once __DIR__ . '/../model/Client.php';
require_once __DIR__ . '/../dao/ClientDao.php';

class PmocController {

    public function index(){
        $pmocs = PmocDao::getAllPmocs();
        include __DIR__ . '/../views/pmoc/pmoc.php';
    }

    // Exibe o formulário para criar PMOC
    public function createPmoc(){
        include __DIR__ . '/../views/pmoc/pmoc_create.php';
    }

    // Recebe o POST do formulário, cria PMOC e redireciona
    public function storePmoc(array $postData){
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
            80204294924,  // pode melhorar isso depois
            $clientId
        );
        $pmocId = PmocDao::addPmoc($pmoc);

        // Criar ar-condicionados
        if (!empty($postData['airconditioners'])) {
            foreach ($postData['airconditioners'] as $index => $value) {
                // Cada 4 inputs correspondem a um Ar Condicionado
                if ($index % 4 == 0) {
                    $airConditioner = new AirConditioner(
                        null,
                        $postData['airconditioners'][$index],       // modelo
                        $postData['airconditioners'][$index + 1],   // btus
                        $postData['airconditioners'][$index + 2],   // descrição
                        $postData['airconditioners'][$index + 3],   // localização
                        $pmocId
                    );
                    AirConditionerDao::addAirConditioner($airConditioner);
                }
            }
        }

        header('Location: ?route=pmoc');  // redireciona para a lista
        exit;
    }

    public function pmocDetails() {
        if (!isset($_GET['id_pmoc'])) {
            throw new Exception("ID do PMOC não informado.");
        }
        $pmocId = (int) $_GET['id_pmoc'];
        
        $pmoc = PmocDao::getPmocById($pmocId);
        if (!$pmoc) {
            throw new Exception("PMOC não encontrado.");
        }
        
        $airConditioners = AirConditionerDao::getAllAirConditionerByPmocId($pmocId);
        include __DIR__ . '/../views/pmoc/pmoc_detail.php';
    }
}

