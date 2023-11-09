
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="noindex"/>
    <meta name="description" content="<?=$oglas['opis']?>"/>
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
    <title>ATM Nekretnine • Kontakt</title>
</head>
<body>
    <?php include 'views/fixed/navigation.php'?>
    <div class="nekretnine_header blog_header">
        <div class="full_overlay"></div>
        <div class="container">
            <div class="single_nek">
                <div class="header_naslov">
                    <div class="v-line"></div>
                    <h1 class="page_h1">Kontakt</h1>
                </div>
                <div class="path">
                    <p>Početna &gt; Kontakt &gt;</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row kontakt_row">
            <div class="forma col-lg-7 col-md-6 col-sm-12 block_border_radius">
                <h2>Pošaljite poruku</h2>
                <form action="https://formsubmit.co/jandric013@gmail.com" method="POST" class="kontakt_forma">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ime i prezime</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Marko Marković" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="marko@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="naslov" class="form-label">Naslov</label>
                        <input type="text" class="form-control" id="naslov" name="_subject" placeholder="Informacije o nekretnine" required>
                    </div>
                    <div class="mb-3">
                        <label for="poruka" class="form-label">Poruka</label>
                        <textarea class="form-control" id="poruka" name='message' rows="3" placeholder="Poruka" required></textarea>
                    </div>
                    <!-- <input type="hidden" name="_next" value="kontakt.php?success=Uspesno ste poslali poruku"> -->
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
            <div class="kontakt kontakt_blok col-lg-5 col-md-6 col-sm-12 block_border_radius contact_block">
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
    </div>

    
    
    
<?php require_once 'views/fixed/footer.php'?>