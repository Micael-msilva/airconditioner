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

        $clientId = $pmoc->getId_client();
        $client = ClientDao::getClientById($clientId);
        
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
            throw new Exception("Nome do PMOC e Nome do Cliente são obrigatórios.");
        }

        // Atualizar cliente
        $client = new Client($postData['client_name'], $postData['client_phone'], PmocDao::getClientIdByPmocId($postData['id_pmoc']));
        ClientDao::updateClient($client);

        // Atualizar PMOC
        $pmoc = new Pmoc(
            $postData['id_pmoc'],
            $postData['name'],
            $postData['creation_date'],
            $postData['service_address'] ?? '',
            80204294924,  // pode melhorar isso depois
            $client->getId()  // ID do cliente atualizado`
        );
        PmocDao::updatePmoc($pmoc);

        header('Location: ?route=pmoc_detail&id_pmoc=' . $pmoc->getId());  // redireciona para os detalhes do PMOC
        exit;
    }

    public function updateAirconditionerDetails(array $postData) {
        if (empty($postData['model']) || empty($postData['btus']) || empty($postData['description']) || empty($postData['location'])) {
            throw new Exception("Todos os campos do ar-condicionado são obrigatórios.");
        }

        $airConditioner = new AirConditioner(
            $postData['id_airconditioner'],
            $postData['model'],
            $postData['btus'],
            $postData['description'],
            $postData['location'],
            $postData['id_pmoc']
        );

        AirConditionerDao::updateAirConditioner($airConditioner);

        header('Location: ?route=pmoc_detail&id_pmoc=' . $airConditioner->getId_pmoc());  // redireciona para os detalhes do PMOC
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
        print_r($postData);
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

