<?php

require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/Pmoc.php';
require_once __DIR__ . '/../dao/AirConditionerDao.php';
require_once __DIR__ . '/../dao/ClientDao.php';

class PmocDao {

    /**
     * @param Pmoc $pmoc
     * @return bool 
     */
    public static function addPmoc(Pmoc $pmoc): int {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO pmoc (name, creation_date, service_address, id_technician, id_client) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $pmoc->getName(),
            $pmoc->getCreation_date(),
            $pmoc->getService_address(),
            $pmoc->getId_technician(),
            $pmoc->getId_client()
        ]);

        return $conn->lastInsertId();  // <- IMPORTANTE!
    }


    /**
     * @param int $id
     * @return Pmoc|null
     */
    public static function getPmocById(int $id): ?Pmoc {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM pmoc WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Pmoc(
                $row['id'],
                $row['name'],
                $row['creation_date'],
                $row['service_address'],
                $row['id_technician'],
                $row['id_client']
            );
        }
        return null;
    }

    public static function getAllPmocs(): array {
        $conn = Connection::getConnection();
        $stmt = $conn->query("SELECT * FROM pmoc");
        $pmocs = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pmocs[] = new Pmoc(
                $row['id'],
                $row['name'],
                $row['creation_date'],
                $row['service_address'],
                $row['id_technician'],
                $row['id_client']
            );
        }
        
        return $pmocs;
    }

    public static function deletePmoc(int $id): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("DELETE FROM pmoc WHERE id = ?");
        // Primeiro, deletar os ar-condicionados associados
        AirConditionerDao::deleteAirConditionersByPmocId($id);
        // Depois, deletar o PMOC
        
        return $stmt->execute([$id]);;
    }

    public static function updatePmoc(Pmoc $pmoc): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "UPDATE pmoc SET name = ?, creation_date = ?, service_address = ?, id_technician = ?, id_client = ? WHERE id = ?"
        );
        return $stmt->execute([
            $pmoc->getName(),
            $pmoc->getCreation_date(),
            $pmoc->getService_address(),
            $pmoc->getId_technician(),
            $pmoc->getId_client(),
            $pmoc->getId()
        ]);
    }

    public static function getClientIdByPmocId(int $pmocId): ?int {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT id_client FROM pmoc WHERE id = ?");
        $stmt->execute([$pmocId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row ? (int)$row['id_client'] : null;
    }

    
}