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
        // Carrega os dados do técnico, idealmente pegue do usuário logado, aqui fixo só para exemplo
        $this->technician = TechnicianDao::getTechnicianById('80204294924');
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

    private function updateTechnician(array $data) {
        if (!empty($data['name'])) {
            // Cria um objeto Technician com os dados atualizados
            $technician = new Technician(
                $data['cpfCnpj'] ?? null,
                $data['name'],
                $data['adress'] ?? null,
                $data['phone'] ?? null,
                $data['crea'] ?? null,
                $data['email'] ?? null
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
