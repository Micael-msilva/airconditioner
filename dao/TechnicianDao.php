<?php

require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/Technician.php';

class TechnicianDAO {

    /**
     * Adiciona um novo técnico no banco de dados.
     *
     * @param Technician $technician
     * @return bool
     */
    public static function addTechnician(Technician $technician): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO technician (cpf_cnpj, name, address, phone, crea, email) 
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        
        return $stmt->execute([
            $technician->getCpf_cnpj(), 
            $technician->getName(), 
            $technician->getAddress(), 
            $technician->getPhone(), 
            $technician->getCrea(),
            $technician->getEmail()
        ]);
    }

    /**
     * Busca um técnico pelo id.
     *
     * @param int $id
     * @return Technician|null
     */
    public static function getTechnicianById(int $id): ?Technician {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM technician WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Technician(
                $row['cpf_cnpj'],
                $row['name'],
                $row['address'],
                $row['phone'],
                $row['crea'],
                $row['email'],
                $id 
            );
        }
        return null;
    }

    /**
     * Retorna um array com todos os técnicos.
     *
     * @return Technician[]
     */
    public static function getAllTechnicians(): array {
        $conn = Connection::getConnection();
        $stmt = $conn->query("SELECT * FROM technician");
        $technicians = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $technicians[] = new Technician(
                $row['cpf_cnpj'],
                $row['name'],
                $row['address'],
                $row['phone'],
                $row['crea'],
                $row['email'],
                $row['id']
            );
        }

        return $technicians;
    }

    /**
     * Atualiza os dados de um técnico, identificando-o pelo novo id.
     *
     * @param Technician $technician
     * @return bool
     */
    public static function updateTechnician(Technician $technician): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "UPDATE technician SET cpf_cnpj = ?, name = ?, address = ?, phone = ?, crea = ?, email = ? WHERE id = ?"
        );

        return $stmt->execute([
            $technician->getCpf_cnpj(),
            $technician->getName(),
            $technician->getAddress(),
            $technician->getPhone(),
            $technician->getCrea(),
            $technician->getEmail(),
            $technician->getId()
        ]);
    }

    /**
     * Exclui um técnico pelo id.
     *
     * @param int $id
     * @return bool
     */
    public static function deleteTechnician(int $id): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("DELETE FROM technician WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
