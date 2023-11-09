<?php

    include 'config/connection.php';
    function getOglas($id){
        global $conn;
        $data = $conn->prepare("SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja  WHERE n.id_nekretnine = :id");
       
        $data->bindParam(":id", $id);

        $data->execute();
        $data=$data->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getOglasImages($id) {
        global $conn;
        $data = $conn->prepare("SELECT * from slike_nekretnine WHERE id_nekretnine=:id");
        $data->bindParam(":id", $id);

        $data->execute();
        $data=$data->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    function getOglasKarakteristike($id) {
        global $conn;
        $data = $conn->prepare("SELECT * from nekretnina_karakteristika nk INNER JOIN karakteristike k ON nk.id_kar=k.id_karakteristike WHERE nk.id_nek=:id");
        $data->bindParam(":id", $id);

        $data->execute();
        $data=$data->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    function getAllFromTable($table) {
        global $conn;
        $data = $conn->prepare("SELECT * from $table");
        $data->execute();
        $data=$data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getLimitedBlog($limit) {
        global $conn;
        $data = $conn->prepare("SELECT * from blogovi ORDER BY created_at DESC LIMIT $limit");
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getSingleBlog($id) {
        global $conn;
        $query = "SELECT * from blogovi WHERE id_blog=:id";
        $data = $conn->prepare($query);
        $data->bindParam(":id", $id);
        $data->execute();
        $data = $data->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    function getBlogImages($id) {
        global $conn;
        $query = "SELECT * from blog_image WHERE id_blog=:id";
        $data = $conn->prepare($query);
        $data->bindParam(":id", $id);
        $data->execute();
        $data = $data->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function getBlogs() {
        global $conn;
        $blogovi = $conn->prepare("SELECT * FROM blogovi LIMIT 6");
 
        if($blogovi->execute()){
            $blogovi = $blogovi->fetchAll(PDO::FETCH_ASSOC);
            return $blogovi;
        }
    }
    function getNewestOglasi() {
        global $conn;
        $query = "SELECT * FROM nekretnine n INNER JOIN gradovi g ON n.id_grad=g.id_grad INNER JOIN drzave d ON g.id_drzava=d.id_drzava INNER JOIN tipovi_nekretnine tn ON n.id_tip_nekretnine=tn.id_tip_nekretnine INNER JOIN tipovi_usluga tu ON n.id_tip_usluge=tu.id_tip_usluge INNER JOIN naselja na ON n.id_naselja=na.id_naselja ORDER BY n.created_at DESC LIMIT 6";

        $data = $conn->prepare($query);
        if($data->execute()){
            $data = $data->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function getKarakteristike($id) {
        global $conn;
        $data = $conn->prepare("SELECT * from nekretnina_karakteristika nk INNER JOIN karakteristike k ON nk.id_kar=k.id_karakteristike WHERE nk.id_nek=:id");
        $data->bindParam(":id", $id);

        if($data->execute()){
            $data=$data->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    function formatPrice($price) {
        return number_format($price);
    }