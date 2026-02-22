<?php
    $database = "mydatabase";
    $host = "127.0.0.1";
    $port = "3306";
    $user = "root";
    $pass = "";
    $dsn = "mysql:dbname={$database};host={$host};port={$port}";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    $connection = new PDO($dsn, $user, $pass, $options);