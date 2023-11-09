<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==='GET') {

            $brojBlogova = $conn->prepare("SELECT COUNT(*) as broj FROM blogovi");
            $brojBlogova->execute();
            $brojBlogova = $brojBlogova->fetch(PDO::FETCH_ASSOC);

            $blogovi = $conn->prepare("SELECT * FROM blogovi LIMIT 6");
 
            if($blogovi->execute()){
                $blogovi = $blogovi->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(['blogovi'=>$blogovi, 'brojBlogova' => $brojBlogova]);
                http_response_code(200);
            }else {
                echo json_encode('Trenutno nema nekretnina');
                http_response_code(404);
            }

    }