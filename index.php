<?php
   require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM `users` JOIN `companies` ON `companies`.`id` = `users`.`company_id`";
        $query = $connection->query($sql);
        $users = $query->fetchAll();

        echo json_encode([
            'title' => 'Главная страница',
            'users' => $users
        ]);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);
    
        $sql = 'INSERT INTO `users`
            (`firstname`, `secondname`, `age`, `company_id`)
            VALUES (?, ?, ?, ?)';
        $query = $connection->prepare($sql);
        $result = $query->execute([
            $data['firstname'],
            $data['secondname'],
            $data['age'],
            $data['company_id']
        ]);
        
        echo json_encode([
            'success' => true
        ]);
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $sql = 'DELETE FROM `users` WHERE `id` = :id';
        $query = $connection->prepare($sql);
        $query->execute([
            'id' => $_GET['id']
        ]);

        echo json_encode([
            'success' => true
        ]);
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $raw = file_get_contents('php://input');
        $data = json_decode($raw, true);

        $sql = 'UPDATE `users` SET
            `firstname` = ?, `secondname` = ?, `age` = ?, `company_id` = ?
            WHERE `id` = ?';
        $query = $connection->prepare($sql);
        $query->execute([
            $data['firstname'],
            $data['secondname'],
            $data['age'],
            $data['company_id'],
            $data['id']
            
        ]);

        echo json_encode([
            'success' => true
        ]);
        die();
    }