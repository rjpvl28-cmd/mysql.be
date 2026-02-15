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

if ($_SERVER[`REQUEST_METHOD`] == `GET`) {
    $sql = 'SELECT * FROM `users`';
    $query = $connection->query($sql);
    $users = $query->fetchAll();
    
    echo json_encode([
        'title' => 'Главная страница',
        'users' => $users
    ]); 
}

if ($_SERVER[`REQUEST_METHOD`] == `POST`) {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    print_r(data);
}
    