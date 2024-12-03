<?php

require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Database {
    private static $dbConnection = null;

    private function __construct() {
    }

    public static function getConnection() {
        if (self::$dbConnection === null) {
            try {
                $host = $_ENV['DB_HOST'];
                $port = $_ENV['DB_PORT'];
                $dbname = $_ENV['DB_NAME'];
                $username = $_ENV['DB_USER'];
                $password = $_ENV['DB_PASS'];
                $sslMode = $_ENV['DB_SSL_MODE'];
                $sslCert = $_ENV['DB_SSL_CERT'];

                $dsn = "mysql:host=$host;port=$port;dbname=$dbname;sslmode=$sslMode;sslrootcert=$sslCert";

                self::$dbConnection = new PDO($dsn, $username, $password);
                self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }

        return self::$dbConnection;
    }
}

try {
    $db = Database::getConnection();
    $stmt = $db->query("SELECT VERSION()");
    echo "Database version: " . $stmt->fetch()[0];

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
