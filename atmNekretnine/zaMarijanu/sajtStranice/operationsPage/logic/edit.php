<?php
    session_start();
    if(!isset($_SESSION['user'])){
    header("Location:../../../../index.php");
    }
    include '../../../../config/connection.php';
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        if(isset($_SESSION['user']['errors'])){
            unset($_SESSION['user']['errors']);
        }
        if(isset($_POST['btn-add'])) {
            $table = $_POST['table'];
            // $text_regex = '/^(?=.*[A-ZČĆŽŠĐ])|(?=.*[a-zčćžšđ])|(?=.*\s).+$/';
            $text_regex = '/^[A-ZČĆŽŠĐa-zčćžšđ\s]+$/';
            $textNum_regex = "/^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d ])[a-zčćžšđA-ZČĆŽŠĐ\d ]*$/";
            $opisRegex = "/^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d.,!?]).*$/";
            $num_regex = "/^[0-9]+$/";
            if($table==='drzave') {
                $drzava = $_POST['drzava'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($text_regex,$drzava)){
                    $greske[]= "Popunite polje, smete koristiti samo slova i razmake"; 
                }
                if(empty($greske)) {
                    $edit = $conn->prepare("UPDATE drzave SET drzava=:drzava WHERE id_drzava=:id");
                    $edit->bindParam(":drzava", $drzava);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/drzave.php");
                    } else {
                        header("Location:../edituj.php?page=drzava&id=$id&error=Nešto nije u redu!");
                    } 
                }else {
                    header("Location:../edituj.php?page=drzava&id=$id&error=Popunite polje, smete koristiti samo slova i razmake!");
                }
               

            } else if($table ==='gradovi'){
                
                $grad = $_POST['grad'];
                $id_drzava = $_POST['drzava'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($text_regex,$grad) || empty($id_drzava)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }
                if(empty($greske)) {
                    $edit = $conn->prepare("UPDATE gradovi SET grad=:grad, id_drzava=:id_drzava WHERE id_grad=:id");
                    $edit->bindParam(":grad", $grad);
                    $edit->bindParam(":id_drzava", $id_drzava);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/gradovi.php");
                    } else {
                        header("Location:../edituj.php?page=grad&id=$id&error=Nešto nije u redu!");
                    }
                }else {
                    header("Location:../edituj.php?page=grad&id=$id&error=Polje grad mora da sadrzi samo slova i razmake!");
                }
                
            } else if($table === 'karakteristike') {
                $karakteristika = $_POST['karakteristika'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($text_regex,$karakteristika)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)) {
                    $edit = $conn->prepare("UPDATE karakteristike SET karakteristika=:karakteristika where id_karakteristike=:id");
                    $edit->bindParam(":karakteristika", $karakteristika);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/karakteristike.php");
                    } else {
                        header("Location:../edituj.php?page=karakteristike&id=$id&error=Nešto nije u redu!");
                    }
                }else {
                    header("Location:../edituj.php?page=karakteristike&id=$id&error=Polje karakteristike mora da sadrzi samo slova i razmake!");
                }

                
            } else if($table==='naselja'){
                $id_grad = $_POST['grad'];
                $naselje = $_POST['naselje'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($textNum_regex,$naselje) || empty($id_grad)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $edit = $conn->prepare("UPDATE naselja SET naselje=:naselje, id_grad=:id_grad WHERE id_naselja=:id");
                    $edit->bindParam(":naselje", $naselje);
                    $edit->bindParam(":id_grad", $id_grad);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/naselja.php");
                    } else {
                        header("Location:../edituj.php?page=naselja&id=$id&error=Nešto nije u redu!");
                    }
                }else {
                    header("Location:../edituj.php?page=naselja&id=$id&error=Polje naselje mora da sadrzi samo slova i razmake!");
                }

                
            } else if($table==='usluge'){
                $usluga = $_POST['usluga'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($text_regex,$usluga)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $edit = $conn->prepare("UPDATE tipovi_usluga SET usluga=:usluga WHERE id_tip_usluge=:id");
                    $edit->bindParam(":usluga", $usluga);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/usluge.php");
                    } else {
                        header("Location:../edituj.php?page=usluge&id=$id&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../edituj.php?page=usluge&id=$id&error=Polje usluga mora da sadrzi samo slova i razmake!");
                }
                
            } else if($table==='tipovi_nekretnine'){
                $tip = $_POST['tip_nekretnine'];
                $id = $_GET['id'];

                $greske = [];
                if(!preg_match($text_regex,$tip)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $edit = $conn->prepare("UPDATE tipovi_nekretnine SET tip_nekretnine=:tip WHERE id_tip_nekretnine=:id");
                    $edit->bindParam(":tip", $tip);
                    $edit->bindParam(":id", $id);
                    if($edit->execute()){
                        header("Location:../../ltr/tipovi-nekretnine.php");
                    } else {
                        header("Location:../edituj.php?page=tipovi-nekretnine&id=$id&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../edituj.php?page=tipovi-nekretnine&id=$id&error=Polje tip nekretnine mora da sadrzi samo slova i razmake!");
                }
                
            } else if ($table === 'nekretnine'){
                $id = $_GET['id'];
                
                $naslov = $_POST['naslov'];
                $cena = $_POST['cena'];
                $opis = $_POST['opis'];
                $grad = $_POST['grad'];
                $mapa_link = $_POST['mapa_link'];
                $naselje = $_POST['naselje'];
                $ulica = $_POST['ulica'];
                $tip_nekretnine = $_POST['tip_nekretnine'];
                $tip_usluge = $_POST['tip_usluge'];
                $naslovna = $_FILES['naslovna'];

                $greske = 0;
                $regexCena = "/\d+/";
                if(empty($cena) || !preg_match($regexCena, $cena)) {
                    $greske++;
                }
                if(!preg_match($textNum_regex,$naslov) || !preg_match($opisRegex,$opis) || empty($mapa_link) || !preg_match($num_regex,$grad) || !preg_match($num_regex,$naselje) || !preg_match($textNum_regex, $ulica) || !preg_match($num_regex,$tip_nekretnine) || !preg_match($num_regex,$tip_usluge)){
                    $greske++;
                }

               

                $errors = [];
                $type = $naslovna['type'];
                $allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
                if($greske === 0) {
                    if(!empty($naslovna['name'])){
                        
                        $fileName = $naslovna['name'];
                        $tmpFajl = $naslovna['tmp_name'];
                        $size = $naslovna['size'];
                        $type = $naslovna['type'];
                        if(!in_array($type, $allowedTypes)) {
                            $errors[] = "Tip fajla nije dozvoljen. Dozvoljeni tipovi su: jpg, jpeg, png i gif.";
                        }

                        $size = $naslovna['size'];
                        if($size > 8000000) {
                            $errors[] = "Fajl ne sme preći 8mb.";
                        }
                            if(count($errors)===0) {
                                if(isset($_SESSION['user']['errors'])){
                                    unset($_SESSION['user']['errors']);
                                    $noviNazivFajla = time()."_".$fileName;
                                    $putanja = "../../../../assets/images/naslovneSlikeOglas/".$noviNazivFajla;
                                    if(move_uploaded_file($tmpFajl, $putanja)){
                                        try{
                                            $query = "UPDATE nekretnine SET naslov=:naslov, opis=:opis, cena=:cena, id_grad=:id_grad, id_tip_nekretnine=:id_tip_nekretnine, id_tip_usluge=:id_tip_usluge, mapa_link=:mapa_link, id_naselja=:id_naselja, ulica=:ulica, naslovna_slika=:naslovna_slika WHERE id_nekretnine=:id";
                                            $edit=$conn->prepare($query);
                                            $edit->bindParam(":naslov", $naslov);
                                            $edit->bindParam(":opis", $opis);
                                            $edit->bindParam(":cena", $cena);
                                            $edit->bindParam(":id_grad", $grad);
                                            $edit->bindParam(":id_tip_nekretnine", $tip_nekretnine);
                                            $edit->bindParam(":id_tip_usluge", $tip_usluge);
                                            $edit->bindParam(":mapa_link", $mapa_link);
                                            $edit->bindParam(":id_naselja", $naselje);
                                            $edit->bindParam(":ulica", $ulica);
                                            $edit->bindParam(":naslovna_slika", $noviNazivFajla);
                                            $edit->bindParam(":id", $id);
                                            if($edit->execute()){
                                                header("Location:../edituj.php?page=oglas&id=$id&success=Uspesno izmenjeno!");
                                            } else {
                                                header("Location:../edituj.php?page=oglas&id=$id&error=Nešto nije u redu!");
                                            }
                                        }catch(PDOException $e){
                                        echo "nesto nije u redu";
                                        }
                                    } 
                                }
                            }
                        
                        
                    } else {
                        
                        try{
                            $query = "UPDATE nekretnine SET naslov=:naslov, opis=:opis, cena=:cena, id_grad=:id_grad, id_tip_nekretnine=:id_tip_nekretnine, id_tip_usluge=:id_tip_usluge, mapa_link=:mapa_link, id_naselja=:id_naselja, ulica=:ulica WHERE id_nekretnine=:id";
                            $edit=$conn->prepare($query);
                            $edit->bindParam(":naslov", $naslov);
                            $edit->bindParam(":opis", $opis);
                            $edit->bindParam(":cena", $cena);
                            $edit->bindParam(":id_grad", $grad);
                            $edit->bindParam(":id_tip_nekretnine", $tip_nekretnine);
                            $edit->bindParam(":id_tip_usluge", $tip_usluge);
                            $edit->bindParam(":mapa_link", $mapa_link);
                            $edit->bindParam(":id_naselja", $naselje);
                            $edit->bindParam(":ulica", $ulica);
                            $edit->bindParam(":id", $id);
                            if($edit->execute()){
                                header("Location:../edituj.php?page=oglas&id=$id&success=Uspesno izmenjeno!");
                            } else {
                                header("Location:../edituj.php?page=oglas&id=$id&error=Nešto nije u redu!");
                            }
                        }catch(PDOException $e){
                        echo "nesto nije u redu";
                        echo '<pre>';
                        var_dump($e);
                        echo '</pre>';
                        }
                    }
                } else {
                    header("Location:../edituj.php?page=oglas&id=$id&error=Nesto niste popunili kako treba. Pokusajte ponovo!");
                }
            } else if($table ==='slike_nekretnine') {
                
                $galerija = $_FILES['galerija'];
                $id = $_GET['id'];

                
                
                if(!empty($galerija['name'][0])) {
                        try{
                            if(isset($_SESSION['user']['errorsGallery'])){

                                unset($_SESSION['user']['errorsGallery']);
                            }
                            for($i = 0; $i < count($_FILES['galerija']['name']); $i++) {

                                $allowedTypes = ["image/jpeg", "image/png", "image/gif"];
                                $size = $galerija['size'][$i];
                                $type = $galerija['type'][$i];
                                $errors = [];
                                if(!in_array($type, $allowedTypes)) {
                                    $errors[] = "Tip fajla nije dozvoljen. Dozvoljeni tipovi su: jpg, jpeg, png i gif.";
                                }
                                if($size > 8000000) {
                                    $errors[] = "Fajl ne sme preći 8mb.";
                                }

                                $fileName = $galerija['name'][$i];
                                $tmpFile = $galerija['tmp_name'][$i];
                                
                                $newName = time()."_".$fileName;
                                $path = "../../../../assets/images/oglasiSlike/".$newName;
                                if(count($errors)===0) {
                                    if(move_uploaded_file($tmpFile, $path)) {
                                        unset($_SESSION['user']['errorsGallery']);
                                        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                        $ext = $ext === 'jpg' ? 'jpeg' : $ext; 
                                        $slika = "imagecreatefrom".$ext;
                                        $newCustomImg = '';
                                        if(function_exists($slika)){
                                            $newCustomImg = call_user_func($slika, $path);
                                        }
                                        $watermark = imagecreatefrompng("../../../../assets/images/watermark/watermark.png");

                                        $originalWidth = imagesx($newCustomImg);
                                        $originalHeight = imagesy($newCustomImg);
                                        $watermarkWidth = imagesx($watermark);
                                        $watermarkHeight = imagesy($watermark);

                                        // Calculate the position for the bottom right corner
                                        $positionX = $originalWidth - 250;
                                        $positionY = $originalHeight - 200;
                                        // Copy the watermark onto the original image
                                        imagecopy($newCustomImg, $watermark, $positionX, $positionY, 0, 0, $watermarkWidth, $watermarkHeight);

                                        // Save the resulting image with the watermark
                                        
                                        $fun = "image".$ext;

                                        $finallPath = "../../../../assets/images/oglasiSlike/".$newName;
                                        if(function_exists($fun)){
                                            $finall = call_user_func($fun, $newCustomImg, $finallPath);
                                        }
                                        // Clean up resources
                                        imagedestroy($newCustomImg);
                                        imagedestroy($watermark);
                                        $insertImage = $conn->prepare("INSERT INTO slike_nekretnine (src, id_nekretnine) VALUES(:src, :id_nekretnine)");
                                        $insertImage->bindParam(":src", $newName);
                                        $insertImage->bindParam(":id_nekretnine", $id);
                                        $insertImage->execute();
                                    }else {header("Location:../edituj.php?page=oglas&id=$id&error=Nešto nije u redu pri unosu fotografija!");}
                                }else {
                                    $_SESSION['user']['errorsGallery']= $errors;
                                    header("Location:../edituj.php?page=oglas&id=$id");
                                }
                                
                            }
                            header("Location:../edituj.php?page=oglas&id=$id&success=Uspesno izmenjeno!");
                        } catch(PDOException $e) {
                            echo $e;
                        }
                    
                    
                } else {
                    header("Location:../edituj.php?page=oglas&id=$id&error=Nešto nije u redu!");
                }
            } else if($table === "nekretnina_karakteristika"){
                $id = $_GET['id'];
                $karakteristike = $conn->prepare("SELECT * from karakteristike");
                $karakteristike->execute();
                $karakteristike = $karakteristike->fetchAll(PDO::FETCH_ASSOC);

                try{
                    foreach($karakteristike as $karakteristika){
                        $id_kar = $karakteristika['id_karakteristike'];
                        $karakteristikaValue = $_POST["karakteristika_".$id_kar];
                        $id_nk = $_POST["nk_num".$id_kar];
                        $isSuccess = 0;
                        if(preg_match($textNum_regex,$karakteristikaValue)) {
                            $isSuccess = 0;
                            $updatekarakteristika = $conn->prepare("UPDATE nekretnina_karakteristika SET vrednost=:vrednost WHERE id_nk=:id");
                            $updatekarakteristika->bindParam(":id", $id_nk);
                            $updatekarakteristika->bindParam(":vrednost", $karakteristikaValue);
                            if($updatekarakteristika->execute()) $isSuccess = 1;
                            
                        }
                        
                    }
                    if($isSuccess) {
                        header("Location:../edituj.php?page=oglas&id=$id&success=Uspesno izmenjeno!");
                    } else {
                        header("Location:../edituj.php?page=oglas&id=$id&error=Nešto nije u redu!");
                    }
                } catch(PDOException $e) {
                    echo $e;
                }
            } else if($table ==="blogovi") {
                $id = $_GET['id'];
                $naslov = $_POST['naslov'];
                $sadrzaj= $_POST['sadrzaj'];
                $naslovnaSlika = $_FILES['naslovna'];
                $galerija = $_FILES['galerija'];

                if(!preg_match($opisRegex,$naslov) || empty($sadrzaj)) {
                    header("Location:../dodaj.php?page=blog&error=Niste popunili pravilno sva polja. Pokusajte Ponovo!");
                }
                $query = "UPDATE blogovi SET naslov=:naslov, content=:sadrzaj";

                if(!empty($naslovnaSlika['name'])){
                    $errors = [];
                    $type = $naslovnaSlika['type'];
                    $allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
                    if(!in_array($type, $allowedTypes)) {
                        $errors[] = "Tip fajla nije dozvoljen. Dozvoljeni tipovi su: jpg, jpeg, webp, png i gif.";
                    }

                    $size = $naslovnaSlika['size'];
                    if($size > 8000000) {
                        $errors[] = "Fajl ne sme preći 8mb.";
                    }
                    if(count($errors)===0) {
                        if(isset($_SESSION['user']['errors'])){
                            unset($_SESSION['user']['errors']);
                        }
                        $fileName = $naslovnaSlika['name'];
                        $tmpFajl = $naslovnaSlika['tmp_name'];
                        $noviNazivFajlaNaslovna = time()."_".$fileName;
                        $putanja = "../../../../assets/images/blog/".$noviNazivFajlaNaslovna;
                        if(move_uploaded_file($tmpFajl, $putanja)) {
                            try {
                                //resize image
                                list($width, $height) = getimagesize($putanja);
                                $ext = strtolower(pathinfo($putanja, PATHINFO_EXTENSION));
                                $newWidth = 600;
                                $newHeight = $height / ($width/$newWidth);
    
                                $ext = $ext === 'jpg' ? 'jpeg' : $ext; 
                                $slika = "imagecreatefrom".$ext;
                               
                                
                                if(function_exists($slika)){
                                    $newCustomImg = call_user_func($slika, $putanja);
                                }
                                $background = imagecreatetruecolor($newWidth, $newHeight);
                                imagecopyresampled($background, $newCustomImg,0,0,0,0,$newWidth,$newHeight,$width,$height);
                            
                                $fun = "image".$ext;
    
                                $thumbnailPath = "../../../../assets/images/blog/".$noviNazivFajlaNaslovna;
    
                                if(function_exists($fun)){
                                    $finall = call_user_func($fun, $background, $thumbnailPath);
                                }
                                $query .= ", main_blog_img=:src";
                                
                            } catch(PDOException $e) {
                                echo $e;
                            }
                        }
                    } else {
                        
                    } 
                }
                    $query.=" WHERE id_blog=:id";
                    $update = $conn->prepare($query);
                    $update->bindParam(":naslov", $naslov, PDO::PARAM_STR);
                    $update->bindParam(":sadrzaj", $sadrzaj, PDO::PARAM_STR);
                    if(!empty($naslovnaSlika['name'])){
                        $update->bindParam(":src", $noviNazivFajlaNaslovna);
                    }
                    $update->bindParam(":id", $id);
                    $isSuccess = $update->execute();

                    if($galerija['name'][0]!==''){

                        if(count($galerija)>0) {
                            if(isset($_SESSION['user']['errors'])){
                                unset($_SESSION['user']['errors']);
                            }
                            
                            for($i = 0; $i < count($_FILES['galerija']['name']); $i++) {
                                
                                $allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
                                $size = $galerija['size'][$i];
                                $type = $galerija['type'][$i];
                                $errors = [];
                                if(!in_array($type, $allowedTypes)) {
                                    $errors[] = "Tip fajla nije dozvoljen. Dozvoljeni tipovi su: jpg, jpeg, webp, png i gif.";
                                }
                                if($size > 8000000) {
                                    $errors[] = "Fajl ne sme preći 8mb.";
                                }

                                $fileName = $galerija['name'][$i];
                                $tmpFile = $galerija['tmp_name'][$i];

                                $newName = time()."_".$fileName;
                                $path = "../../../../assets/images/blog/".$newName;
                                if(count($errors)===0){
                                    if(move_uploaded_file($tmpFile, $path)) {
                                        $insertImage = $conn->prepare("INSERT INTO blog_image (src, id_blog) VALUES(:src, :id_blog)");
                                        $insertImage->bindParam(":src", $newName, PDO::PARAM_STR);
                                        $insertImage->bindParam(":id_blog", $id);
                                        $isSuccess = $insertImage->execute();
                                        
                                    } else {
                                        header("Location:../edituj.php?page=blog");
                                    }
                                } else {
                                    $_SESSION['user']['errors']= $errors;
                                }
                                
                            }
                        }
                    }

                     if($isSuccess) {
                        header("Location:../edituj.php?page=blog&id=$id&success=Uspesno izmenjeno!");
                    }
            }
        }else header("Location: ../../../../index.php");
    }else header("Location: ../../../../index.php");