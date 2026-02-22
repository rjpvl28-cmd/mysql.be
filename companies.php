<?php
   require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM `companies`";
        $query = $connection->query($sql);
        $companies = $query->fetchAll();

        echo json_encode([
            'companies' => $companies
        ]);
        exit();
    }