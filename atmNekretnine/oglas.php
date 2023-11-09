<?php
    $oglas_num = $_GET['oglas'];
    include 'models/function.php';
    if(!isset($oglas_num)) {
        header("Location: index.php");
    }
    $oglas = getOglas($oglas_num);
    $slike = getOglasImages($oglas_num);
    $karakteristike = getOglasKarakteristike($oglas_num);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="index"/>
    <meta name="description" content="<?=$oglas['opis']?>"/>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Browser icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/ATM__1_-removebg-preview.ico">
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
    <title>ATM Nekretnine Pancevo • <?=$oglas['naslov']?></title>
</head>
<body>
<?php include 'views/fixed/navigation.php'?>
    <div class="nekretnine_header">
        <div class="full_overlay"></div>
        <div class="container">
            <div class="single_nek">
                <div class="header_naslov">
                    <div class="v-line"></div>
                    <h1 class="page_h1"><?=$oglas['naslov']?></h1>
                </div>
                <div class="path">
                    <p>Početna &gt; Nekretnine &gt; Ponuda </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main_info">
            <div class="oglas_naslov">
                <h2 class="oglas_podnaslov"><?=$oglas['naslov']?> -<?=$oglas['ulica']?></h2>
                <div class="cena_block">
                    <p class="cena-bold"><?=formatPrice($oglas['cena'])?> &euro;</p>
                    <p class="disclamer">+ troškovi agencije</p>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 slider">
                <div class="slider-for slide img_slider">
                    <?php foreach($slike as $slika):?>
                    <a class="example-image-link" href="assets/images/oglasiSlike/<?=$slika['src']?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image d-block w-100 img" src="assets/images/oglasiSlike/<?=$slika['src']?>" alt="slika<?=$slika['id_slike']?>"/></a> 
                    <?php endforeach;?>
                   
                </div>
                <div class="slider-nav slide img_slider">
                    <?php foreach($slike as $slika):?>
                    <div><img class="example-image d-block w-100 img" src="assets/images/oglasiSlike/<?=$slika['src']?>" alt="slika<?=$slika['id_slike']?>"/></div>
                    <?php endforeach;?>
                </div>
                <!-- <div id="carouselExampleRide" class="carousel slide img_slider" data-bs-ride="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="example-image-link" href="assets/images/staticImages/pancevo_4.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-fluid d-block w-100 img" src="assets/images/staticImages/pancevo_4.jpg" alt=""/></a>
                        </div>
                        <div class="carousel-item">
                        <a class="example-image-link" href="assets/images/staticImages/kucanamisi.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-fluid d-block w-100 img" src="assets/images/staticImages/kucanamisi.jpg" alt=""/></a>
                        </div>
                        <div class="carousel-item">
                        <a class="example-image-link" href="assets/images/staticImages/pancevo_februar_2022_zima.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image img-fluid d-block w-100 img" src="assets/images/staticImages/pancevo_februar_2022_zima.jpg" alt=""/></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> -->
            </div>
        </div>
        <div class="row row_info mt-5">
            <div class="info col-lg-7 col-md-6 col-sm-12 block_border_radius">
                <div class="info_header">
                    <div class="tip_oglasa <?=strtolower($oglas['usluga'])?>">
                        <p><?=$oglas['usluga']?></p>
                    </div>
                    <a href="<?=$oglas['mapa_link']?>" class="underline_btn">Pogledaj na mapi</a>
                </div>
                <div class="info_body">
                    <div class="main_oglas_info">
                        <div class="row info_row">
                            <div class="col-8 og_left">
                                <div class="oglas_naslov">
                                    <h3><?=$oglas['naslov']?></h3>
                                </div>
                                <div class="oglas_lokacija">
                                    <img src="assets/images/staticImages/map.png" alt="map icon"/>
                                    <p class="ulica"><?=$oglas['ulica']?></p>
                                </div>
                            </div>
                            <div class="col-4 og_right">
                                <div class="oglas_cena">
                                    <p class="cena_oglasa"><?=formatPrice($oglas['cena'])?>€</p>
                                    <p class="disclamer">+ troškovi agencije</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="oglas_opis">
                        <span class="opis_heading">Opis</span>
                        <p><?=$oglas['opis']?></p>
                    </div>
                </div>
            </div>
            <div class="kontakt col-lg-5 col-md-6 col-sm-12 block_border_radius contact_block">
                <div class="kontakt_header">
                    <span class="span_heading">Kontakt Agencije</span>
                </div>
                <div class="kontakt_content">
                    <div class="ct_block">
                        <img src="assets/images/staticImages/telephone.png" alt="telephone icon"/>
                        <p class="kontakt_info">062332505</p>
                    </div>
                    <div class="ct_block">
                        <img src="assets/images/staticImages/map42.png" alt="map icon"/>
                        <p class="kontakt_info">Karađorđeva 22</p>
                    </div>
                    <div class="ct_block">
                        <img src="assets/images/staticImages/gmail.png" alt="gmail icon"/>
                        <p class="kontakt_info mail_kontakt">atmnekretninepancevo@gmail.com</p>
                    </div>
                    <div class="ct_block">
                        <img src="assets/images/staticImages/instagram.png" alt="instagram icon"/>
                        <p class="kontakt_info">@atmnekretnine</p>
                    </div>
                    <div class="ct_block">
                        <img src="assets/images/staticImages/facebook.png" alt="facebook icon"/>
                        <p class="kontakt_info">@atmnekretnine</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-12 block_border_radius vise_informacija">
                <?php foreach($karakteristike as $karakteristika):?>
                <div class="nekretnina_informacije">
                    <p class="specifikacija"><?=$karakteristika['karakteristika']?></p>
                    <p class="vrednost_spec"><?=$karakteristika['vrednost']?></p>
                </div>
                <?php endforeach;?>
            </div>
        </div>

    </div>
    <div class="oglas_istaknute_nek istaknute_nekretnine bg-transparent">
        <div class="container nek_ct">
            <div class="h2-block">
                <h2 class="H2podnaslov">Slične Nekretnine</h2>
                <div class="h2Line"></div>
                <p class="podnaslov">Izdvajamo Slično: Nekretnine koje ne smete propustiti.</p>
            </div>
            <div class="in_content">

                <div class="in_ponuda">
                </div>
            </div>
        </div>
    </div>
    <div class="type none" data-type="<?=$oglas['naselje']?>"></div>
    
<?php require_once 'views/fixed/footer.php'?>