<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "php_login_database";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connección fallida: " . $e->getMessage());
    }
?>