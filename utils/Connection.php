<?php

class Connection {
    private static $host = 'localhost';
    private static $dbName = 'airconditioner';
    private static $username = 'root';
    private static $password = '101212';
    private static $connection = null;

    /**
     * Static method to get the PDO connection.
     *
     * @return PDO
     */
    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbName,
                    self::$username,
                    self::$password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection error: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
