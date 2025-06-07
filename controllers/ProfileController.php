<?php
// controllers/ProfileController.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../model/Technician.php';
require_once __DIR__ . '/../dao/TechnicianDao.php';

class ProfileController {
    private $technician;
    private $message;

    public function __construct() {
        // Utiliza o id fixo do técnico (1) até que o login esteja implementado
        $this->technician = TechnicianDao::getTechnicianById(1);
    }

    public function handleRequest(array $postData = null) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $postData) {
            $this->updateTechnician($postData);
        }
        // Após atualizar ou em GET, carrega a view passando os dados
        $technician = $this->technician;
        $message = $this->message ?? null;

        include __DIR__ . '/../views/profile.php';
    }

    private function addTechnician(array $data) {
        if (!empty($data['name'])) {
            // Cria um objeto Technician com os dados fornecidos, incluindo o id fixo (1)
            $technician = new Technician(
                $data['cpfCnpj'] ?? null,
                $data['name'],
                $data['adress'] ?? null,
                $data['phone'] ?? null,
                $data['crea'] ?? null,
                $data['email'] ?? null,
                1  // id fixo do técnico
            );

            // Chama o método para adicionar o técnico
            $success = TechnicianDao::addTechnician($technician);

            if ($success) {
                $this->technician = $technician; // Atualiza para refletir na view
                $this->message = ['text' => 'Perfil adicionado com sucesso!', 'type' => 'success'];
            } else {
                $this->message = ['text' => 'Erro ao adicionar o perfil.', 'type' => 'error'];
            }
        } else {
            $this->message = ['text' => 'O campo nome é obrigatório.', 'type' => 'error'];
        }
    }

    private function updateTechnician(array $data) {
        if (!empty($data['name'])) {
            // Cria um objeto Technician com os dados atualizados, incluindo o id fixo (1)
            $technician = new Technician(
                $data['cpfCnpj'] ?? null,
                $data['name'],
                $data['adress'] ?? null,
                $data['phone'] ?? null,
                $data['crea'] ?? null,
                $data['email'] ?? null,
                1  // id fixo do técnico
            );

            // Troque 'addTechnician' por um método adequado para update, se existir
            $success = TechnicianDao::updateTechnician($technician);

            if ($success) {
                $this->technician = $technician; // Atualiza para refletir na view
                $this->message = ['text' => 'Perfil atualizado com sucesso!', 'type' => 'success'];
            } else {
                $this->message = ['text' => 'Erro ao atualizar o perfil.', 'type' => 'error'];
            }
        } else {
            $this->message = ['text' => 'O campo nome é obrigatório.', 'type' => 'error'];
        }
    }
}
