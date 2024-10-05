<?php
class pdo_connection {
    public $pdo, $user, $password, $host, $database;

    function __construct($user, $password, $host, $database) {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->database = $database;
    }

    function create_connection() {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);

        return $this->pdo;
    }
}