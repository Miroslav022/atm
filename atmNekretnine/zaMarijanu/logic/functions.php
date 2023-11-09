<?php
    include '../../../config/connection.php';

    function getAllData($table) {
        $query = "SELECT * FROM $table";
        
        global $conn;
        $data = $conn->prepare($query);
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getAllCities(){
        $query = "SELECT * FROM gradovi g INNER JOIN drzave d on g.id_drzava=d.id_drzava";
        global $conn;
        $data = $conn->prepare($query);
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getSingleItem($id, $table, $id_table) {
        global $conn;
        $query = '';
        if($table === 'gradovi'){
            $query = "SELECT * FROM gradovi g inner join drzave d on d.id_drzava = g.id_drzava WHERE $id_table=:id";
        } else if($table ==='naselja'){
            $query = "SELECT * FROM naselja n inner join gradovi g on n.id_grad = g.id_grad WHERE $id_table=:id";
        }else {
            $query = "SELECT * FROM $table WHERE $id_table=:id";
        }
        $item = $conn->prepare($query);
        $item->bindParam(":id",$id);
        $item->execute();
        $item = $item->fetch(PDO::FETCH_ASSOC);
        return $item;
    }
    function getOglas($id){
        global $conn;
        $query="SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja WHERE n.id_nekretnine=:id";
        $oglas = $conn->prepare($query);
        $oglas->bindParam(":id", $id);
        if($oglas->execute()){
            return $oglas->fetch(PDO::FETCH_ASSOC);
        }
    }
    function getOglaskarakteristike($id_nek, $id_kar){
        global $conn;
        $query = "SELECT * FROM karakteristike k INNER JOIN nekretnina_karakteristika nk ON k.id_karakteristike=nk.id_kar INNER JOIN nekretnine n ON nk.id_nek=n.id_nekretnine WHERE id_nek=:id_nek AND id_kar=:id_kar ";
        $karakteristike = $conn->prepare($query);
        $karakteristike->bindParam(":id_nek", $id_nek);
        $karakteristike->bindParam(":id_kar", $id_kar);
        if($karakteristike->execute()){
            return $karakteristike->fetch(PDO::FETCH_ASSOC);
        }

    }