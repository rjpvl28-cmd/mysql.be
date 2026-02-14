<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }
    
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $raw = file_get_contents('php://input');
    //     $data = json_decode($raw, true);
    //      echo json_encode($data);   
    // } else {
    //      echo json_encode(['hello' => 'world']);   
    // }