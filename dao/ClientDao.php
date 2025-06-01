<?php

require_once __DIR__ . '/../utils/Connection.php';
require_once __DIR__ . '/../model/Client.php';

class ClientDao {

    /**
     * Salva um novo cliente no banco e retorna o ID inserido
     *
     * @param Client $client
     * @return int|null Retorna o ID do cliente criado, ou null em caso de erro
     */
    public static function addClient(Client $client): ?int {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO client (name, phone) VALUES (?, ?)"
        );

        $success = $stmt->execute([
            $client->getName(),
            $client->getPhone()
        ]);

        if ($success) {
            return (int) $conn->lastInsertId();
        } else {
            return null;
        }
    }

    /**
     * Busca um cliente pelo ID
     *
     * @param int $id
     * @return Client|null
     */
    public static function getClientById(int $id): ?Client {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Client(
                $row['id'],
                $row['name'],
                $row['phone']
            );
        }

        return null;
    }

    /**
     * Busca todos os clientes cadastrados
     *
     * @return Client[]
     */
    public static function getAllClients(): array {
        $conn = Connection::getConnection();
        $stmt = $conn->query("SELECT * FROM clients");
        $clients = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = new Client(
                $row['id'],
                $row['name'],
                $row['phone']
            );
        }

        return $clients;
    }

}
