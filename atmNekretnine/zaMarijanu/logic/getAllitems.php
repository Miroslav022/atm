<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        
        $table = $_POST['table'];
        if($table==='nekretnina_karakteristika'){
            $id_nk = $_POST['id_og'];
            $query= "SELECT * FROM nekretnina_karakteristika nk INNER JOIN karakteristike k ON nk.id_kar=k.id_karakteristike WHERE id_nek=:id_nk";
            $data = $conn->prepare($query);
            $data->bindParam(":id_nk", $id_nk);
            $data->execute();
            $data = $data->fetchAll(PDO::FETCH_ASSOC);
            if(count($data)>0) {
                echo json_encode($data);
                http_response_code(200);
            } else {
                echo json_encode("Nema karakteristika za ovaj oglas");
                http_response_code(404);
            }
        }else {
            $query = '';
            if($table === 'naselja') {
                $query = 'SELECT * FROM naselja n inner join gradovi g on n.id_grad=g.id_grad inner join drzave d ON g.id_drzava=d.id_drzava';
            } else if($table ==='gradovi'){
                $query="SELECT * FROM gradovi g INNER JOIN drzave d on g.id_drzava=d.id_drzava";
            } else {
                $query= "SELECT * from $table";
            }
            $data = $conn->prepare($query);
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