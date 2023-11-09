<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $table = $_POST['table'];
        if($table==="slike_nekretnine") {
            $id=$_POST['id'];
            $query="SELECT * FROM slike_nekretnine WHERE id_nekretnine=:id";
            $data = $conn->prepare($query);
            $data->bindParam(":id", $id);
            $data->execute();
            $data = $data->fetchAll(PDO::FETCH_ASSOC);
            if($data) {
                echo json_encode($data);
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        } else {
            $id=$_POST['id'];
            $query="SELECT * FROM blog_image WHERE id_blog=:id";
            $data = $conn->prepare($query);
            $data->bindParam(":id", $id);
            $data->execute();
            $data = $data->fetchAll(PDO::FETCH_ASSOC);
            if($data) {
                echo json_encode($data);
                http_response_code(200);
            } else {
                http_response_code(500);
            }
        }
    } else http_response_code(404);