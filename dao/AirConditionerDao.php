<?php

require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/AirConditioner.php';

class AirConditionerDao {

    /**
     * @param AirConditioner $airConditioner
     * @return bool 
     */
    public static function addAirConditioner(AirConditioner $airConditioner): bool {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO air_conditioner (brand, btus, description, location, id_pmoc) VALUES (?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $airConditioner->getBrand(),
            $airConditioner->getBtus(),
            $airConditioner->getDescription(),
            $airConditioner->getLocation(),
            $airConditioner->getId_pmoc()
        ]);
    }

    /**
     * @param int $id
     * @return AirConditioner|null
     */
    public static function getAirConditionerById(int $id): ?AirConditioner {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM air_conditioner WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new AirConditioner(
                $row['id'],
                $row['brand'],
                $row['btus'],
                $row['description'],
                $row['location'],
                $row['id_pmoc']
            );
        }
        return null;
    }

    public static function getAllAirConditioners(): array {
        $conn = Connection::getConnection();
        $stmt = $conn->query("SELECT * FROM air_conditioner");
        $airConditioners = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $airConditioners[] = new AirConditioner(
                $row['id'],
                $row['brand'],
                $row['btus'],
                $row['description'],
                $row['location'],
                $row['id_pmoc']
            );
        }
        
        return $airConditioners;
    }
}