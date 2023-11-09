<?php
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="POST") {
        $table = $_POST['table'];
        $rowCount = 10;
        $step = $_POST['step'];
        $step = $step * $rowCount;
        if(!empty($table)) {
            $query="SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja";
            $data = $conn->prepare($query);
            $data ->execute();
            $brojOglasa = $data->fetchAll(PDO::FETCH_ASSOC);
            $brojOglasa = count($brojOglasa);

            $query.=" LIMIT $step, $rowCount";
            $data = $conn->prepare($query);
            if($data -> execute()) {
                $data = $data -> fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(["oglasi"=>$data, "brojOglasa"=>$brojOglasa]);
                http_response_code(200);
            } else {
                echo json_encode('Trenutno nema nekretnina');
                http_response_code(404);
            }
        }
    }