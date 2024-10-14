<?php
//PDO

    $host = 'localhost';
    $database = 'store';
    $user = 'user1';
    $password = 'password1';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    } catch (Exception $ex) {
        echo '<p>ERROR connecting to database</p>';
        error_log("db_connection.php, SQL error=".$ex->getMessage());
        return FALSE;
    }

?>