<?php
class DatabaseConnection {
    private $server;

    public function __construct($host, $username, $password, $database) {
        $this->server = mysqli_connect($host, $username, $password, $database);
    }

    public function getServer() {
        return $this->server;
    }
}

$databaseConnection = new DatabaseConnection("localhost", "root", "", "oper");
$server = $databaseConnection->getServer();
?>