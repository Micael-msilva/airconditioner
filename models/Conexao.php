<?php

class Conexao {
    private static $host = 'localhost';
    private static $dbName = 'airconditioner';
    private static $username = 'root';
    private static $password = 'bancodedados';
    private static $conn = null;

    /**
     * Método estático para obter a conexão PDO.
     *
     * @return PDO
     */
    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbName,
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão: ' . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
