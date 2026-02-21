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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = 'SELECT * FROM `users`';
    $query = $connection->query($sql);
    $users = $query->fetchAll();
    
    echo json_encode([
        'title' => 'Главная страница',
        'users' => $users
    ]); 
    die();

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    // print_r(data);
    $sql = 'INSERT INTO `users` (`firstname`, `secondname`, `age`) 
            VALUES (?, ?, ?)';
    $query = $connection->prepare($sql);
    $result = $query->execute([
        $data['firstname'],
        $data['secondname'],
        $data['age'],
    ]);

    echo json_encode([
        'sucess' => true,
    ]);
    exit(); 
}
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $sql = 'DELETE FROM `users` WHERE `id` = :id';
    $query = $connection->prepare($sql);
    $query->execute([
        'id' => $_GET['id']
    ]);
    echo json_encode([
        'sucess' => true
    ]);
}
if ($_SERVER['REQUEST_METHOD'] == 'UPDATE') {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    $sql = 'UPDATE `users` SET `firstname` = ?, `age` = ?, WHERE `id` = ?';
    $query->execute([
        $data['firstname'],
        $data['secondname'],
        $data['age'],
        $data['id']
    ]);
     echo json_encode([
        'sucess' => true
    ]);
}
    