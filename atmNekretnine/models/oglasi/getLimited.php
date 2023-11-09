<?php
    include '../../config/connection.php';
    if($_SERVER['REQUEST_METHOD']==="POST"){
            $rowCount = 6;
            $step = $_POST['step'];
            $step = $step * $rowCount;
            
            $query = "SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja WHERE 1=:num";
            $num_regex = "/^[0-9]+$/";
            $search_regex = "/^[a-zA-Z0-9\s]+$/";

            if(isset($_POST['params']['drzava']) && $_POST['params']['drzava']!='' && $_POST['params']['drzava']!='0' && preg_match($num_regex, $_POST['params']['drzava'])){
               
                $query.= " AND g.id_drzava=".$_POST['params']['drzava']."";
            }

            if(isset($_POST['params']['grad']) && $_POST['params']['grad']!='' && $_POST['params']['grad']!='0' && preg_match($num_regex, $_POST['params']['grad'])){
                $query.= " AND n.id_grad=".$_POST['params']['grad']."";
            }

            if(isset($_POST['params']['naselja']) && $_POST['params']['naselja']!='' && $_POST['params']['naselja']!='0' && preg_match($num_regex, $_POST['params']['naselja'])){
                $query.= " AND n.id_naselja=".$_POST['params']['naselja']."";
            }
            
            if(isset($_POST['params']['tip_nekretnine']) && $_POST['params']['tip_nekretnine']!='' && $_POST['params']['tip_nekretnine']!='0' && preg_match($num_regex, $_POST['params']['tip_nekretnine'])){
                $query.= " AND n.id_tip_nekretnine=".$_POST['params']['tip_nekretnine']."";
            }

            if(isset($_POST['params']['tip_usluge']) && $_POST['params']['tip_usluge']!='' && $_POST['params']['tip_usluge']!='0' && preg_match($num_regex, $_POST['params']['tip_usluge'])){
                $query.= " AND n.id_tip_usluge=".$_POST['params']['tip_usluge']."";
            }
            if(isset($_POST['params']['min_cena']) && $_POST['params']['min_cena']!='' && preg_match($num_regex, $_POST['params']['min_cena'])){
                $query.= " AND n.cena >= ".$_POST['params']['min_cena']."";
            }
            if(isset($_POST['params']['max_cena']) && $_POST['params']['max_cena']!='' && $_POST['params']['max_cena']!='0' && preg_match($num_regex, $_POST['params']['max_cena'])){
                $query.= " AND n.cena <= ".$_POST['params']['max_cena']."";
            }
            if(isset($_POST['params']['search']) && $_POST['params']['search']!='' && preg_match($search_regex, $_POST['params']['search'])) {
                $query .= " AND n.naslov LIKE('%".$_POST['params']['search']."%')";
            }

            if(isset($_POST['params']['sort']) && $_POST['params']['sort']!='') {
                if($_POST['params']['sort']==='cena-asc'){
                    $query.= " ORDER BY n.cena ASC";
                }
                if($_POST['params']['sort']==='cena-desc'){
                    $query.= " ORDER BY n.cena DESC";
                }
            }

            $num = 1;

            $brojOglasa = $conn->prepare($query);
            $brojOglasa->bindParam(":num", $num);
            $brojOglasa->execute();
            $brojOglasa = $brojOglasa->fetchAll(PDO::FETCH_ASSOC);
            $brojOglasa = count($brojOglasa);


            $query.=" LIMIT $step, $rowCount";

            $oglasi = $conn->prepare($query);
            $oglasi->bindParam(":num", $num);
 
            if($oglasi->execute()){
                $oglasi = $oglasi->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(["oglasi"=>$oglasi, "brojOglasa"=>$brojOglasa]);
                http_response_code(200);
            }else {
                echo json_encode('Trenutno nema nekretnina');
                http_response_code(404);
            }
    } else {
        header("Location: ../../index.php");
    } 