<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==='GET') {

            $brojOglasa = $conn->prepare("SELECT COUNT(*) as broj FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja");
            $brojOglasa->execute();
            $brojOglasa = $brojOglasa->fetch(PDO::FETCH_ASSOC);

            $oglasi = $conn->prepare("SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja LIMIT 6");
 
            if($oglasi->execute()){
                $oglasi = $oglasi->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(['oglasi'=>$oglasi, 'brojOglasa' => $brojOglasa]);
                http_response_code(200);
            }else {
                echo json_encode('Trenutno nema nekretnina');
                http_response_code(404);
            }

    } else if($_SERVER["REQUEST_METHOD"]==="POST"){
            $id = $_POST['id'];


            $data = $conn->prepare("SELECT * from nekretnina_karakteristika nk INNER JOIN karakteristike k ON nk.id_kar=k.id_karakteristike WHERE nk.id_nek=:id");
            $data->bindParam(":id", $id);
    
            if($data->execute()){
                $data=$data->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($data);
                http_response_code(200);
            }

    }