<?php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);

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
        header('Location: ?route=pmoc');  // redireciona para a lista
        exit;
    }

    public function pmocDetails() {
        if (!isset($_GET['id_pmoc'])) {
            throw new Exception("ID do PMOC não informado.");
        }
        //print_r($_GET);
        $pmocId = (int) $_GET['id_pmoc'];
        $pmoc = PmocDao::getPmocById($pmocId);
        //print_r($pmoc);
        //print($pmoc->getId_client());
        $clientId = $pmoc->getId_client();
        $client = ClientDao::getClientById($clientId);
        //print_r($client);

        if (!$pmoc) {
            throw new Exception("PMOC não encontrado.");
        }
        
        $airConditioners = AirConditionerDao::getAllAirConditionerByPmocId($pmocId);
        
        include __DIR__ . '/../views/pmoc/pmoc_detail.php';
    }

    public function deletePmoc() {
        if (!isset($_GET['id_pmoc'])) {
            throw new Exception("ID do PMOC não informado.");
        }
        $pmocId = (int) $_GET['id_pmoc'];
        
        // Excluir ar-condicionados associados
        AirConditionerDao::deleteAirConditionersByPmocId($pmocId);
        
        // Excluir PMOC
        PmocDao::deletePmoc($pmocId);
        
        header('Location: ?route=pmoc');  // redireciona para a lista
        exit;
    }



    public function updatePmocDetails(array $postData) {
        if (empty($postData['name']) || empty($postData['client_name'])) {
            throw new Exception("Nome do PMOC e do Cliente são obrigatórios.");
        }

        // Atualizar cliente
        $client = new Client($postData['client_name'], $postData['client_phone'], $postData['id_client']);
        ClientDao::updateClient($client);

        // Atualizar PMOC
        $pmoc = new Pmoc(
            $postData['name'],
            $postData['creation_date'],
            $postData['service_address'] ?? '',
            1,
            $postData['id_client'],
            $postData['id_pmoc']
        );
        PmocDao::updatePmoc($pmoc);

        header('Location: ?route=pmoc_detail&id_pmoc=' . $pmoc->getId());  // redireciona para os detalhes do PMOC
        exit;
    }

    public function updateAirconditionerDetails(array $postData) {
        if (empty($postData['brand']) || empty($postData['btus']) || empty($postData['description']) || empty($postData['location'])) {
            throw new Exception("Todos os campos do ar-condicionado são obrigatórios.");
        }

        $airConditioner = new AirConditioner(
            $postData['brand'],
            $postData['btus'],
            $postData['description'],
            $postData['location'],
            $postData['id_pmoc'],
            $postData['id_airconditioner']
        );

        AirConditionerDao::updateAirConditioner($airConditioner);

        header('Location: ?route=pmoc_detail&id_pmoc=' . $airConditioner->getId_pmoc());
        exit;
    }

    public function deleteAirconditioner() {
        if (!isset($_GET['id_airconditioner'])) {
            throw new Exception("ID do ar-condicionado não informado.");
        }
        $airConditionerId = (int) $_GET['id_airconditioner'];
        
        // Excluir ar-condicionado
        AirConditionerDao::deleteAirConditioner($airConditionerId);
        
        // Redirecionar para os detalhes do PMOC
        header('Location: ?route=pmoc_detail&id_pmoc=' . $_GET['id_pmoc']);
        exit;
    }

    public function createAirconditioner(array $postData) {
        //print_r($postData);
        if (empty($postData['brand']) || empty($postData['btus']) || empty($postData['description']) || empty($postData['location'])) {
            throw new Exception("Todos os campos do ar-condicionado são obrigatórios.");
        }
        
        $airConditioner = new AirConditioner(
            $postData['brand'],
            $postData['btus'],
            $postData['description'],
            $postData['location'],
            $postData['id_pmoc'],
            null
        );
        AirConditionerDao::addAirConditioner($airConditioner);

        header('Location: ?route=pmoc_detail&id_pmoc=' . $airConditioner->getId_pmoc());  // redireciona para os detalhes do PMOC
        exit;
    }

}

