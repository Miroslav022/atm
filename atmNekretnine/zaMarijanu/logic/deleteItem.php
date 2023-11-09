<?php   
    include '../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $table = $_POST['table'];
        $id = $_POST["id"];
        $id_table = '';
        if($table === 'gradovi') {
            $id_table = 'id_grad';
        } else if($table==='drzave') {
            $id_table = 'id_drzava';
        } else if($table ==='karakteristike') {
            $id_table = "id_karakteristike";
        } else if($table ==='naselja') {
            $id_table = "id_naselja";
        } else if($table === "tipovi_usluga") {
            $id_table = "id_tip_usluge";
        } else if($table === 'tipovi_nekretnine') {
            $id_table = "id_tip_nekretnine";
        } else if($table === 'nekretnine'){
            $id_table = "id_nekretnine";
            global $conn;
            $sveSlike = $conn->prepare("SELECT * FROM slike_nekretnine WHERE id_nekretnine=:id");
            $sveSlike->bindParam(":id", $id);
            $sveSlike->execute();
            $sveSlike = $sveSlike->fetchAll(PDO::FETCH_ASSOC);
            foreach($sveSlike as $slike) {
                unlink("../../assets/images/oglasiSlike/".$slike['src']."");
                $deleteSlike = $conn->prepare("DELETE from slike_nekretnine WHERE id_nekretnine=:id");
                $deleteSlike->bindParam(":id", $id);
                $deleteSlike->execute();
            }
        } else if($table === "slike_nekretnine") {
            $id_table = "id_slike";
            $src = $_POST["src"];
            unlink("../../assets/images/oglasiSlike/$src");
            
        } else if($table === "nekretnina_karakteristika") {
            
            $id_table = "id_nk";
        } else if($table === "blogovi") {
            $id_table="id_blog";
            $deleteImages = $conn->prepare("DELETE FROM blog_image WHERE id_blog=:id");
            $deleteImages->bindParam(":id", $id);
            $deleteImages->execute();
        } else if($table === 'blog_image'){
            $id_table = 'id_blog_img';
        }
        $delete = $conn->prepare("DELETE FROM $table WHERE $id_table=:id");
        $delete->bindParam(':id',$id);
        if($delete->execute()){
            echo json_encode("Uspesno brisanje");
            http_response_code(200);
        } else {
            http_response_code(500);
        }

    } else header("Location: ../index.php");