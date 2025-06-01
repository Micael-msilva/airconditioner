<?php

require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/Technician.php';

class TechnicianDAO {

    /**
     * @param Technician
     * @return bool 
     */

    public static function addTechnician(Technician $technician): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("INSERT INTO technician (cpf_cnpj, name, address, phone, crea, email) VALUES (?, ?, ?, ?, ?, ?)");
        
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
     * @param int $cpf_cnpj
     * @return Technician|null
     */
    public static function getTechnicianById(int $cpf_cnpj): ?Technician {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM technician WHERE cpf_cnpj = ?");
        $stmt->execute([$cpf_cnpj]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Technician(
                $row['cpf_cnpj'],
                $row['name'],
                $row['address'],
                $row['phone'],
                $row['crea'],
                $row['email']
            );
        }
        return null;
    }

    public static function getId(){
        
    }

    
}
