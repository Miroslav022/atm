<?php
    include 'models/function.php';
    $drzave = getAllFromTable('drzave');
    $gradovi = getAllFromTable('gradovi');
    $naselja = getAllFromTable('naselja');
    $tipovi_nekretnine = getAllFromTable('tipovi_nekretnine');
    $tipovi_usluga = getAllFromTable('tipovi_usluga');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="index"/>
    <meta name="description" content="Pronađite sve nekretnine iz Pančeva i okoline na jednom mestu! Pregledajte naš izbor stanova, kuća, poslovnih prostora i zemljišta uz jednostavnu pretragu. Saznajte više o svakoj nekretnini, brzo pronađite svoj savršen dom ili investiciju. Vaša agencija za nekretnine u Pančevu ATM Nekretnine"/>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <!-- Browser Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/ATM__1_-removebg-preview.ico"/>
    <!-- Icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'/>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'/>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'/>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <!-- swiper -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <!-- LightBox -->
    <link href="node_modules/lightbox2/src/css/lightbox.css" rel="stylesheet" />
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/slick-1.8.1/slick/slick-theme.css"/>
    <!-- Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>ATM Nekretnine Pancevo • Nekretnine</title>
</head>
<body>
    <?php include 'views/fixed/navigation.php'?>
    <div class="nekretnine_header">
        <div class="full_overlay"></div>
        <div class="container">
            <div class="nek_header_content">
                <div class="header_naslov">
                    <div class="v-line"></div>
                    <h1 class="page_h1">Nekretnine</h1>
                </div>
                <div class="path">
                    <p>Početna &gt; Nekretnine &gt; </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 pr-lg-4 filters">
            <h2 class="filter_heading">Filteri</h2>
            <a href="" class="close">&#x2715</a>
            <form action="" class="filteri">
                <div class="row">
                    <div class="col-md-12 input_block mt-4">
                        <label for="drzava">Država</label>
                        <select name="drzava" id="drzava">
                            <option value="0">Izaberite</option>
                            <?php foreach($drzave as $drzava):?>
                            <option value="<?=$drzava['id_drzava']?>"><?=$drzava['drzava']?></option>
                            <?php endforeach;?>

                        </select>
                    </div>
                    <div class="input_block mt-4">
                        <label for="grad">Grad</label>
                        <select name="grad" id="grad">
                            <option value="0">Izaberite</option>
                            <?php foreach($gradovi as $grad):?>
                            <option value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="input_block mt-4">
                        <label for="naselja">Naselje</label>
                        <select name="naselja" id="naselja">
                            <option value="0">Izaberite</option>    
                            <?php foreach($naselja as $naselje):?>
                            <option value="<?=$naselje['id_naselja']?>"><?=$naselje['naselje']?></option>
                            <?php endforeach;?>
                            
                        </select>
                    </div>
                    <div class="input_block mt-4">
                        <label for="tip_nekretnine">Tip Nekretnine</label>
                        <select name="tip_nekretnine" id="tip_nekretnine">
                            <option value="0">Izaberite</option>
                            <?php foreach($tipovi_nekretnine as $tip_nek):?>
                            <option value="<?=$tip_nek['id_tip_nekretnine']?>"><?=$tip_nek['tip_nekretnine']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="input_block mt-4">
                        <label for="usluga">Tip usluge</label>
                        <select name="tip_usluge" id="usluga">
                            <option value="0">Izaberite</option>
                            <?php foreach($tipovi_usluga as $tip_usluga):?>
                            <option value="<?=$tip_usluga['id_tip_usluge']?>"><?=$tip_usluga['usluga']?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="input_block mt-4">
                        <label for="min_cena">Minimalna Cena</label>
                        <input type="text" name="min_cena" id="min_cena">
                    </div>
                    <div class="input_block mt-4"> 
                        <label for="max_cena">Maksimalna Cena</label>
                        <input type="text" name="max_cena" id="max_cena">
                        </select>
                    </div>
                    <div class="input_block mt-4">
                    <button type="submit" class="btn filter_btn">Pretraži</button>
                    </div>
                </div>
                
            </form>
        </div>
        <div class="col-lg-9 col-sm-12 istaknute_nekretnine">
                
                <div class="in_content">
                <div class="filter-mobile">
                    <a href="#" class="openFilterBtn">Filteri</a>
                </div>
                    <form action="" class="sort_search">
                        <div class="row d-flex justify-content-between">
                        <div class="col-md-3 input_block">
                            <select name="sortiraj" id="sortiraj">
                                <option value="0">Sortiraj</option>
                                <option value="cena-asc">cena rastuce</option>
                                <option value="cena-desc">cena opadajuce</option>
                            </select>
                        </div>
                        <div class="col-md-3 input_block d-flex gap-1">
                            <input type="text" placeholder="Pretraži" id="search">
                            <button class="search-btn">Pretraži</button>
                        </div>
                        </div>
                    </form>
                    <div class="in_ponuda">
                        <span>Učitavanje</span>
                    </div>
                    <div class="arrows">
                        <img class="back" src="assets/images/staticImages/straight-left-arrow.png" alt="back icon"/>
                        <img class="next" src="assets/images/staticImages/straight-right-arrow.png" alt="next icon"/>
                    </div>
                </div>
        </div>
    </div>
    </div>
    
<?php require_once 'views/fixed/footer.php'?>