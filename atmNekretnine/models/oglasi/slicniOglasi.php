<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="GET") {
        $type = $_GET['type'];
        $query = "SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja WHERE na.naselje = :typeValue LIMIT 3;";

        $type_regex="/^[a-zA-Z0-9\s]+$/";
        if(preg_match($type_regex, $type)){
            $data = $conn->prepare($query);
            $data->bindParam(":typeValue", $type);
            if($data->execute()){
                $data = $data->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($data);
            }
        }
        
    }