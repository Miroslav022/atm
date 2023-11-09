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
        $table = $_POST['table'];
        if(isset($_POST['btn-add'])) {
            $text_regex = '/^[A-ZČĆŽŠĐa-zčćžšđ\s]+$/';
            $textNum_regex = "/^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d ])[a-zčćžšđA-ZČĆŽŠĐ\d ]*$/";
            $opisRegex = "/^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d.,!?]).*$/";
            $num_regex = "/^[0-9]+$/";
            if($table==='drzave') {
                $drzava = $_POST['drzava'];
                $greske = [];
                if(!preg_match($text_regex,$drzava)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $insert = $conn->prepare("INSERT INTO drzave (drzava) VALUES(:drzava)");
                    $insert->bindParam(":drzava", $drzava);
                    if($insert->execute()){
                        header("Location:../../ltr/drzave.php");
                    } else {
                        header("Location:../dodaj.php?page=drzava&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=drzava&error=Niste uneli ispravno podatke, polje moze da sadrzi samo velika i mala slova");
                }
               

            } else if($table ==='gradovi'){
                $grad = $_POST['grad'];
                $id_drzava = $_POST['drzava'];
                
                $greske = [];
                if(!preg_match($text_regex,$grad) || !preg_match($num_regex,$id_drzava)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)) {
                    $insert = $conn->prepare("INSERT INTO gradovi (grad, id_drzava) VALUES(:grad, :id_drzava)");
                    $insert->bindParam(":grad", $grad);
                    $insert->bindParam(":id_drzava", $id_drzava);
                    if($insert->execute()){
                        header("Location:../../ltr/gradovi.php");
                    } else {
                        header("Location:../dodaj.php?page=grad&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=grad&error=Niste popunili pravilno sva polja. Grad sme da sadrzi samo velika i mala slova");
                }
                
            } else if($table === 'karakteristike') {
                $karakteristika = $_POST['karakteristika'];

                $greske = [];
                if(!preg_match($text_regex,$karakteristika)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)) {
                    $insert = $conn->prepare("INSERT INTO karakteristike (karakteristika) VALUES(:karakteristika)");
                    $insert->bindParam(":karakteristika", $karakteristika);
                    if($insert->execute()){
                        header("Location:../../ltr/karakteristike.php");
                    } else {
                        header("Location:../dodaj.php?page=karakteristike&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=karakteristike&error=Niste popunili pravilno sva polja. Karakteristika sme da sadrzi samo velika i mala slova!");
                }
                
            } else if($table==='naselja'){
                $id_grad = $_POST['grad'];
                $naselje = $_POST['naselje'];

                $greske = [];
                if(!preg_match($textNum_regex,$naselje) || !preg_match($num_regex,$id_grad)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }
                if(empty($greske)) {
                    $insert = $conn->prepare("INSERT INTO naselja (naselje, id_grad) VALUES(:naselje, :id_grad)");
                    $insert->bindParam(":naselje", $naselje);
                    $insert->bindParam(":id_grad", $id_grad);
                    if($insert->execute()){
                        header("Location:../../ltr/naselja.php");
                    } else {
                        header("Location:../dodaj.php?page=naselja&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=naselje&error=Niste popunili pravilno sva polja. Naselje sme da sadrzi samo velika mala slova i brojeve");
                }
                
            } else if($table==='usluge'){
                $usluga = $_POST['usluga'];

                $greske = [];
                if(!preg_match($text_regex,$usluga)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $insert = $conn->prepare("INSERT INTO tipovi_usluga (usluga) VALUES(:usluga)");
                    $insert->bindParam(":usluga", $usluga);
                    if($insert->execute()){
                        header("Location:../../ltr/usluge.php");
                    } else {
                        header("Location:../dodaj.php?page=usluge&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=usluge&error=Niste popunili pravilno sva polja. Pokusajte Ponovo!");
                }
                
            } else if($table==='tipovi_nekretnine'){
                $tip = $_POST['tip_nekretnine'];

                $greske = [];
                if(!preg_match($text_regex,$tip)){
                    $greske[]= "Polje ne sme biti prazno"; 
                }

                if(empty($greske)){
                    $insert = $conn->prepare("INSERT INTO tipovi_nekretnine (tip_nekretnine) VALUES(:tip)");
                    $insert->bindParam(":tip", $tip);
                    if($insert->execute()){
                        header("Location:../../ltr/tipovi-nekretnine.php");
                    } else {
                        header("Location:../dodaj.php?page=tipovi-nekretnine&error=Nešto nije u redu!");
                    }
                } else {
                    header("Location:../dodaj.php?page=tip-nekretnine&error=Niste popunili pravilno sva polja. Pokusajte Ponovo!");
                }

                
            } else if($table==='nekretnine'){
                //Dohvati sve karakteristike 
                $karakteristike = $conn->prepare("SELECT * from karakteristike");
                $karakteristike->execute();
                $karakteristike = $karakteristike->fetchAll(PDO::FETCH_ASSOC);

                $naslov = $_POST['naslov'];
                $cena = $_POST['cena'];
                $opis = $_POST['opis'];
                $mapa_link = $_POST['mapa_link'];
                $grad = $_POST['grad'];
                $naselje = $_POST['naselje'];
                $ulica = $_POST['ulica'];
                $tip_nekretnine = $_POST['tip_nekretnine'];
                $tip_usluge = $_POST['tip_usluge'];
                $naslovna = $_FILES['naslovna'];

                $galerija = $_FILES['galerija'];

                $greske = 0;
                if(!preg_match($textNum_regex,$naslov)){
                    $greske++ ;
                }

                $regexCena = "/\d+/";
                if(empty($cena) || !preg_match($regexCena, $cena)) {
                    $greske++;
                }

                if(!preg_match($opisRegex,$opis)){
                    $greske++;
                }

                if(empty($mapa_link)) {
                    $greske++;
                }

                if(!preg_match($num_regex,$grad)) {
                    $greske++;
                }

                if(!preg_match($num_regex,$naselje)) {
                    $greske++;
                }

                if(!preg_match($textNum_regex,$ulica) || !preg_match($num_regex,$tip_nekretnine) || !preg_match($num_regex,$tip_usluge) || empty($naslovna) || empty($galerija)) {
                    $greske ++;
                }

                $errors = [];
                $type = $naslovna['type'];
                $allowedTypes = ["image/jpeg", "image/png", "image/gif", "image/webp"];
                if(!in_array($type, $allowedTypes)) {
                    $errors[] = "Tip fajla nije dozvoljen. Dozvoljeni tipovi su: jpg, jpeg, webp, png i gif.";
                }

                $size = $naslovna['size'];
                if($size > 6000000) {
                    $errors[] = "Fajl ne sme preći 6mb.";
                }

                if($greske===0) {
                    if(count($errors)===0) {
                        if(isset($_SESSION['user']['errors'])){
                            unset($_SESSION['user']['errors']);
                        }
                        $fileName = $naslovna['name'];
                        $tmpFajl = $naslovna['tmp_name'];
                        $noviNazivFajlaNaslovna = time()."_".$fileName;
                        $putanja = "../../../../assets/images/naslovneSlikeOglas/".$noviNazivFajlaNaslovna;
                        if(move_uploaded_file($tmpFajl, $putanja)){
                            try{
                                //resize image
                                list($width, $height) = getimagesize($putanja);
                                $ext = strtolower(pathinfo($putanja, PATHINFO_EXTENSION));
                                $newWidth = 400;
                                $newHeight = $height / ($width/$newWidth);

                                $ext = $ext === 'jpg' ? 'jpeg' : $ext; 
                                $slika = "imagecreatefrom".$ext;
                               
                                
                                if(function_exists($slika)){
                                    echo 'usao';
                                    $newCustomImg = call_user_func($slika, $putanja);
                                }
                                $background = imagecreatetruecolor($newWidth, $newHeight);
                                imagecopyresampled($background, $newCustomImg,0,0,0,0,$newWidth,$newHeight,$width,$height);
                            
                                $fun = "image".$ext;

                                $thumbnailPath = "../../../../assets/images/naslovneSlikeOglas/".$noviNazivFajlaNaslovna;

                                if(function_exists($fun)){
                                    $finall = call_user_func($fun, $background, $thumbnailPath);
                                }

                                $query = "INSERT INTO nekretnine (naslov, opis, cena, id_grad, id_tip_nekretnine, id_tip_usluge, mapa_link, id_naselja, ulica, naslovna_slika) VALUES(:naslov, :opis, :cena, :id_grad, :id_tip_nekretnine, :id_tip_usluge, :mapa_link, :id_naselja, :ulica, :naslovna_slika)";
                                $conn->beginTransaction();
                                $insertNekretnina = $conn->prepare($query);
                                $insertNekretnina->bindParam(":naslov",$naslov);
                                $insertNekretnina->bindParam(":opis",$opis);
                                $insertNekretnina->bindParam(":cena",$cena);
                                $insertNekretnina->bindParam(":id_grad",$grad);
                                $insertNekretnina->bindParam(":id_tip_nekretnine",$tip_nekretnine);
                                $insertNekretnina->bindParam(":id_tip_usluge",$tip_usluge);
                                $insertNekretnina->bindParam(":mapa_link",$mapa_link);
                                $insertNekretnina->bindParam(":id_naselja",$naselje);
                                $insertNekretnina->bindParam(":ulica",$ulica);
                                $insertNekretnina->bindParam(":naslovna_slika",$noviNazivFajlaNaslovna);
                
                                $isSuccess = $insertNekretnina->execute();
                                if($isSuccess){
                                    $lastInsertedId = $conn->lastInsertId();
                                    
                                    //INSERT KARAKTERISTIKE
                                    foreach($karakteristike as $karakteristika){
                                        $id_kar = $karakteristika['id_karakteristike'];
                                        $karakteristikaValue = $_POST["karakteristika_".$id_kar];
                                        if(!empty($karakteristikaValue)) {

                                            
                                            $insertkarakteristika = $conn->prepare("INSERT INTO nekretnina_karakteristika (id_kar, id_nek, vrednost) VALUES(:id_kar, :id_nek, :vrednost)");
                                            $insertkarakteristika->bindParam(":id_kar", $id_kar);
                                            $insertkarakteristika->bindParam(":id_nek", $lastInsertedId);
                                            $insertkarakteristika->bindParam(":vrednost", $karakteristikaValue);
                                            $insertkarakteristika->execute();
                                            
                                        }
                                    }
                
                                    //INSERT IMAGES
                                    if(count($galerija)>0) {
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
                                            $path = "../../../../assets/images/oglasiSlike/".$newName;
                                            if(count($errors)===0){
                                                if(move_uploaded_file($tmpFile, $path)) {
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
                                                    $insertImage->bindParam(":id_nekretnine", $lastInsertedId);
                                                    $insertImage->execute();
                                                    
                                                } else {
                                                    header("Location:../dodaj.php?page=oglas");
                                                }
                                            } else {
                                                $_SESSION['user']['errors']= $errors;
                                            }
                                            
                                        }
                                    }
                                    header("Location:../../ltr/oglasi.php");
                                    $conn->commit();
                                }
                            } catch(PDOException $e){
                                $conn->rollBack();
                                echo "nesto nije u redu";
                            }
                        } else {
                            header("Location:../dodaj.php?page=oglas&error=Postoji problem pri unosenju slika!");
                        }
                    } else {
                        $_SESSION['user']['errors'] = $errors;
                        header("Location:../dodaj.php?page=oglas");
                    }
                    
                } else {
                    header("Location:../dodaj.php?page=oglas&error=Nesto niste popunili kako treba. Pokusajte ponovo!");
                }

                
                
               

            } else if($table ==='blogovi'){
                $sadrzajRegex = "/^(?=.*[a-zčćžšđA-ZČĆŽŠĐ\d.,!?<>\/]).*$/";
                $naslov = $_POST['naslov'];
                $sadrzaj= $_POST['sadrzaj'];
                $naslovnaSlika = $_FILES['naslovna'];
                $galerija = $_FILES['galerija'];

                if(!preg_match($opisRegex,$naslov) || !preg_match($sadrzajRegex,$sadrzaj)) {
                   
                    header("Location:../dodaj.php?page=blog&error=Niste popunili pravilno sva polja. Pokusajte Ponovo!");
                }

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
                            $query = "INSERT INTO blogovi (naslov, content, main_blog_img) VALUES(:naslov, :content, :main_blog_img)";
                            $conn->beginTransaction();
                            $insert = $conn->prepare($query);
                            $insert->bindParam(":naslov", $naslov);
                            $insert->bindParam(":content", $sadrzaj);
                            $insert->bindParam(":main_blog_img", $noviNazivFajlaNaslovna);
                            if($insert->execute()){
                                $lastInsertedId = $conn->lastInsertId();
                                if(count($galerija)>0) {
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
                                                $insertImage->bindParam(":src", $newName);
                                                $insertImage->bindParam(":id_blog", $lastInsertedId);
                                                $insertImage->execute();
                                                
                                            } else {
                                                header("Location:../dodaj.php?page=blog");
                                            }
                                        } else {
                                            $_SESSION['user']['errors']= $errors;
                                        }
                                        
                                    }
                                }
                                header("Location:../../ltr/blog.php");
                                $conn->commit();
                            }
                        }catch(PDOException $e) {
                            $conn->rollBack();
                            echo $e;
                        }
                    } 
                }
            }
        }else if($table ==='nekretnina_karakteristika') {
            $id_kar = $_POST['karakteristika_id'];
            $id_oglasa = $_POST["id_oglasa"];
            $value = $_POST["value"];

            if(preg_match($textNum_regex, $value)) {
                $insert = $conn->prepare("INSERT INTO nekretnina_karakteristika (vrednost, id_kar, id_nek) VALUES(:vrednost, :id_kar, :id_nek)");
                $insert->bindParam(":vrednost", $value);
                $insert->bindParam(":id_kar", $id_kar);
                $insert->bindParam(":id_nek", $id_oglasa);
                if($insert->execute()){
                    $id = $conn->lastInsertId();
                    $data = array("id_nk"=> $id, "value"=>$value, "id_karakteristike"=>$id_kar, "id_nekretnine"=> $id_oglasa);
                    echo json_encode($data);
                    http_response_code(201);
                } else {
                    echo json_encode("Doslo je do greske pri unosu karakteristika");
                    http_response_code(500);
                }
            } else {
                header("Location:../dodaj.php?page=oglas&error=Niste popunili pravilno sva polja. Pokusajte Ponovo!");
            }

            

        }else header("Location: ../../../index.php");
    }else header("Location: ../../../../index.php");