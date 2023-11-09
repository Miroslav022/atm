<?php
     include 'models/function.php';
     $drzave = getAllFromTable('drzave');
     $gradovi = getAllFromTable('gradovi');
     $naselja = getAllFromTable('naselja');
     $tipovi_nekretnine = getAllFromTable('tipovi_nekretnine');
     $limitedBlog = getLimitedBlog(4);

     $limitedOlasi = getNewestOglasi();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="index"/>
    <meta name="description" content="ATM Nekretnine Vaš pouzdani izvor za prodaju i iznajmljivanje nekretnina. Pregledajte našu raznovrsnu ponudu stanova, kuća, poslovnih prostora i zemljišta. S našom stranicom, pronađite savršeni dom ili investicijsku priliku. Otkrijte najnovije nekretnine, pravne informacije i stručne savete za brzu i sigurnu trgovinu nekretninama. Počnite danas i ostvarite svoje snove o idealnom domu ili pametnom investiranju."/>
   
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
    <title>ATM Nekretnine Pancevo • Home</title>
    </head>
    <body>
        <?php include 'views/fixed/navigation.php'?>
        <header class="index_header">
                <div class="overlay"></div>
                <div class="header_container">
            
                <div class="content">
                    <div class="hero-text">
                            <h1 class="naslov"><span class="red-bold">Nekretnine</span> za sve životne trenutke</h1>
                            <p class="hero-podnaslov">Pronađite <span class="red-bold">dom</span> koji odražava vašu priču, a mi ćemo vam pomoći u tome</p>
                            <img src="assets/images/staticImages/scribble.png" alt="arrow" class="hero_arrow"/>
                    </div>
                    
                    <div class="fast_search_form">
                        <form action="models/oglasi/searchFromHero.php" method="POST" class="hero_form">
                            <div class="search_block">
                                <div class="search_params">
                                <div class="fs_icon">
                                    <img src="assets/images/staticImages/countries.png" alt="country icon"/>
                                </div>
                                <div class="fs_input">
                                    <label for="drzava">Država</label>
                                    <select name="drzava" id="drzava" class="fs-ddl">
                                        <option value="0">izaberite</option>
                                        <?php foreach($drzave as $drzava):?>
                                        <option value="<?=$drzava['id_drzava']?>"><?=$drzava['drzava']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                </div>
                                <div class="form_line"></div>
                            </div>
                            <div class="search_block">
                                <div class="search_params">
                                <div class="fs_icon">
                                    <img src="assets/images/staticImages/skyscraper.png" alt="city icon"/>
                                </div>
                                <div class="fs_input">
                                    <label for="mesto">Grad</label>
                                    <select name="mesto" id="mesto" class="fs-ddl">
                                        <option value="0">izaberite</option>
                                        <?php foreach($gradovi as $grad):?>
                                        <option value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                </div>
                                <div class="form_line"></div>
                            </div>
                            <div class="search_block">
                                <div class="search_params">
                                <div class="fs_icon">
                                    <img src="assets/images/staticImages/map.png" alt="country icon"/>
                                </div>
                                <div class="fs_input">
                                    <label for="lokacija">Naselje</label>
                                    <select name="lokacija" id="lokacija" class="fs-ddl">
                                        <option value="0">izaberite</option>
                                        <?php foreach($naselja as $naselje):?>
                                        <option value="<?=$naselje['id_naselja']?>"><?=$naselje['naselje']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                </div>
                                <div class="form_line"></div>
                            </div>
                            <div class="search_block">
                                <div class="search_params">
                                <div class="fs_icon">
                                    <img src="assets/images/staticImages/house.png" alt="country icon"/>
                                </div>
                                <div class="fs_input">
                                    <label for="tip">Tip</label>
                                    <select name="tip" id="tip" class="fs-ddl">
                                        <option value="0">izaberite</option>
                                        <?php foreach($tipovi_nekretnine as $tip):?>
                                        <option value="<?=$tip['id_tip_nekretnine']?>"><?=$tip['tip_nekretnine']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                </div>
                                <div class="form_line"></div>
                            </div>
                            <input type="submit" name="submit_btn" value="Pretraži" class="btn">
                        </form>
                    </div>
                    <div class="hero_soc_prof">
                        <div class="hero-sp-blok">
                            <p class="sp-num">5+</p>
                            <p class="sp-text">Godina iskustva</p>
                        </div>
                        <div class="hero-sp-blok">
                            <p class="sp-num">100+</p>
                            <p class="sp-text">Zadovoljnih klijenata</p>
                        </div>
                    </div>
                </div> 
                
                
            </div>
            <div class="hero_soc_links">
                    <div class="soc_line"></div>
                    <i class="fi fi-brands-instagram"></i>
                    <i class="fi fi-brands-facebook"></i>
                    <i class="fi fi-sr-envelope"></i>
            </div>
            <!-- Slider -->
            <div class="carousel">
                    <div class="carousel_inner">
                        <div class="carousel_item carousel_item__active">
                            <img src="assets/images/staticImages/image1.jpg" alt="hero image 1" class="carousel_img">
                        </div>
                        <div class="carousel_item">
                            <img src="assets/images/staticImages/image2.jpg" alt="hero image 3" class="carousel_img">
                        </div>
                        <div class="carousel_item">
                            <img src="assets/images/staticImages/image3.jpg" alt="hero image 3" class="carousel_img">
                        </div>
                    </div>
                </div>
        </header>
    <div class="container" id="usluge_section">
        <div class="usluge" >
            <div class="h2-block">
                <h2 class="H2podnaslov">Usluge kojue pružamo</h2>
                <div class="h2Line"></div>
                <p class="podnaslov">Istražite naše širok spektar usluga.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 usluga-blok">
                    <img src="assets/images/staticImages/payment-method.png" alt="payment icon">
                    <h3 class="usluga-naslov">Prodaja</h3>
                    <p class="usluga-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-4 col-md-12 usluga-blok">
                    <img src="assets/images/staticImages/house2.png" alt="house icon">
                    <h3 class="usluga-naslov">Iznajmljivanje</h3>
                    <p class="usluga-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="col-lg-4 col-md-12 usluga-blok">
                    <img src="assets/images/staticImages/sheet.png" alt="sheet icon">
                    <h3 class="usluga-naslov">Upravljanje</h3>
                    <p class="usluga-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="istaknute_nekretnine">
        <div class="container">
            <div class="h2-block">
                <h2 class="H2podnaslov">Istaknute Nekretnine</h2>
                <div class="h2Line"></div>
                <p class="podnaslov">Izdvajamo najbolje: Nekretnine koje ne smijete propustiti.</p>
            </div>
            <div class="in_content">
                <div class="buttons">
                    <div class="filter_buttons">
                        <!-- <a href="#" class="outline-btn filter-nek-btn" data-type='poslovni prostor'>Poslovni prostori</a>
                        <a href="#" class="outline-btn filter-nek-btn" data-type='garaza'>Garaže</a>
                        <a href="#" class="outline-btn filter-nek-btn" data-type='stan'>Stanovi</a>
                        <a href="#" class="outline-btn filter-nek-btn" data-type='zemljiste'>Zemljišta</a>
                        <a href="#" class="outline-btn filter-nek-btn" data-type='kuca'>Kuće</a> -->
                    </div>
                    <a href="nekretnine.php" class="underline_btn">Pogledaj celu ponudu <i class="fi fi-rr-angle-small-right"></i></a>
                </div>
                <div class="in_ponuda">
                    <?php foreach($limitedOlasi as $oglas):?>
                        <?php
                            $opis = substr($oglas['opis'], 0, 80);
                            $opis.="...";
                            $naslov = substr($oglas['naslov'], 0,30);
                            $naslov.='...';
                            ?>
                        <div class="nekretnina" data-type="<?=$oglas['tip_nekretnine']?>">
                                <div class="slika">
                                    <img src="assets/images/naslovneSlikeOglas/<?=$oglas['naslovna_slika']?>" alt="<?=$oglas['naslov']?> image">
                                </div>
                                <div class="nek_blok_info">
                                    <div class='oglas-card-header'>
                                    <p class="naziv_nek"><?=$naslov?></p>
                                    <p class='tip_oglasa <?=strtolower($oglas['usluga'])?>'><?=$oglas['usluga']?></p>
                                    </div>
                                    <div class='info'>
                                        <?php
                                            $karakteristika=getKarakteristike($oglas['id_nekretnine']);
                                            $potrebne = ["povrsina", "broj kupatila", "broj soba"];
                                            for($i=0; $i<count($karakteristika); $i++) {
                                                
                                                $trenutnaKarakteristika = strtolower($karakteristika[$i]['karakteristika']);
                                                if(!in_array($trenutnaKarakteristika, $potrebne)) {
                                                    continue;
                                                }
                                                echo "<div class='s_karak'>";
                                                echo $trenutnaKarakteristika === "povrsina" ? '<i class="fa-solid fa-chart-area"></i>' : '';
                                                echo $trenutnaKarakteristika === "broj soba" ? '<i class="fa-solid fa-house"></i>' : '';
                                                echo $trenutnaKarakteristika === "broj kupatila" ? '<i class="fa-solid fa-toilet"></i>':'';
                                                echo "<p class='nek_karak'>".$karakteristika[$i]["vrednost"]; echo $trenutnaKarakteristika==="povrsina" ? ' &#13217' : ''."</p>";
                                                echo "</div>";
                                            }
                                        ?>
                                    </div>
                                    
                                    <p class="cena">cena: <span class="cena-bold"><?=formatPrice($oglas['cena'])?>&euro;</span></p>
                                    <p class="kratak_opis"><?=$opis?></p>
                                    <a href="oglas.php?oglas=<?=$oglas['id_nekretnine']?>" class="outline-btn nek_btn">Pogledaj Detaljnije</a>
                                </div>
                        </div>
                    <?php endforeach;?>
                </div>
        </div>
    </div>
    
    <div class="container">
        <div class="zasto_nas">
            <div class="row">
                <div class="col-lg-6 img_rounded">
                    <div class="img_holder">
                        <div class="overlay_rounded"></div>
                    </div>
                    <div class="img_border"></div>
                </div>
                <div class="col-lg-6 content_zn">
                    <div class="h2-block left-align">
                        <h2 class="H2podnaslov">Zasto izabrati nas?</h2>
                        <div class="h2Line"></div>
                        <p class="podnaslov">Iza nas stoji iskustvo i integritet</p>
                    </div>
                    <div class="content_zasto_nas">
                        <div class="zn_block">
                            <img src="assets/images/staticImages/best-customer-experience.png" alt="best customer experience icon"/>
                            <p class="zn_tekst">Stručnost i iskustvo</p>
                        </div>
                        <div class="zn_block">
                            <img src="assets/images/staticImages/guidance.png" alt="gudance icon"/>
                            <p class="zn_tekst">Personalizovani pristup</p>
                        </div>
                        <div class="zn_block">
                            <img src="assets/images/staticImages/networking.png" alt="network icon"/>
                            <p class="zn_tekst">Široka mreža i resursi</p>
                        </div>
                        <div class="zn_block">
                            <img src="assets/images/staticImages/collaboration.png" alt="collaboration icon"/>
                            <p class="zn_tekst">Transparentnost i integritet</p>
                        </div>
                        <a href="" class="btn">Pogledaj ponudu</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="cta_section">
        <div class="overlay_block"></div>
        <div class="cta_content">
            <h2 class="cta_heading">Vaša Sledeća Nekretnina Je Samo Klik Daleko</h2>
            <p class="cta_content">Spremni smo da Vam pomognemo u ostvarivanju Vaših snova</p>
            <a href="nekretnine.php" class="btn">Pogledaj ponudu</a>
        </div>
    </div>
    <div class="container" id="o_nama">
        <div class="o_nama">
                <div class="row">
                    <div class="col-lg-6 o_nama_6">
                        <div class="h2-block left-align">
                            <h2 class="H2podnaslov">O Nama</h2>
                            <div class="h2Line"></div>
                            <p class="podnaslov max_391">Dugogodišnje Iskustvo: Vaš pouzdan partner u svetu nekretnina.</p>
                        </div>
                        <div class="o_nama_block">
                            <p class="o_nama_content">ATM Nekretnine su vaš pouzdan partner u svetu nekretnina. Sa strašću prema poslu i predanošću našim klijentima, radimo naporno kako bismo ostvarili vaše snove u oblasti nekretnina.
                            </p>
                            <p class="o_nama_content">
                            Naš tim iskusnih stručnjaka vodi vas kroz svaki korak procesa kupovine ili prodaje nekretnine, obezbeđujući vam stručno vođstvo i personalizovanu pažnju koju zaslužujete. Svestrani i proaktivni, mi smo tu da vas podržimo i olakšamo vam put ka ostvarivanju vaših ciljeva.
                            </p>
                            <a href="" class="btn">Kontakt</a>
                        </div>
                    </div>
                    <div class="col-lg-5 img_rounded">
                        <div class="o_nama_img_holder">
                            <div class="overlay_rounded"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="container">
    <div class="istaknuti_blogovi">
            <div class="h2-block">
                <h2 class="H2podnaslov">Istaknuti Blogovi</h2>
                <div class="h2Line"></div>
                <p class="podnaslov blog_podnaslov">Posetite naš blog i uživaje u pažljivo napisanim člancima</p>
            </div>
            <div class="blog_container">
                <?php foreach($limitedBlog as $blog):?>
                <div class="single_blog">
                    <div class="img_blog_holder"><img src="assets/images/blog/<?=$blog['main_blog_img']?>" alt="<?=$blog['naslov']?>"/></div>
                    <div class="date_ct">
                        <i class="fi fi-rr-calendar"></i>
                        <?php $date = strtotime($blog['created_at']);?>
                        <div class="date"><?=date("d-M-Y",$date)?></div>
                    </div>
                    <h3 class="blog_heading"><?=$blog['naslov']?></h3>
                    <a href="blogPost.php?id=<?=$blog['id_blog']?>" class="underline_btn red_btn">Pročitaj Više</a>
                </div>
                <?php endforeach;?>
                <!-- <div class="single_blog">
                    <div class="img_blog_holder"><img src="assets/images/staticImages/IMG_20210807_182126.jpg" alt=""></div>
                    <div class="date_ct">
                        <i class="fi fi-rr-calendar"></i>
                        <div class="date">Sep 23, 2023</div>
                    </div>
                    <h3 class="blog_heading">Pančevački Letnji Festivali: Mesto Gde Se Događaju Najbolji Koncerti i Druženja.</h3>
                    <a href="" class="underline_btn red_btn">Pročitaj Više</a>
                </div>
                <div class="single_blog">
                    <div class="img_blog_holder"><img src="assets/images/staticImages/pancevo_februar_2022_zima.jpg" alt=""></div>
                    <div class="date_ct">
                        <i class="fi fi-rr-calendar"></i>
                        <div class="date">Sep 23, 2023</div>
                    </div>
                    <h3 class="blog_heading">Pančevački Letnji Festivali: Mesto Gde Se Događaju Najbolji Koncerti i Druženja.</h3>
                    <a href="" class="underline_btn red_btn">Pročitaj Više</a>
                </div>
                <div class="single_blog">
                    <div class="img_blog_holder"><img src="assets/images/staticImages/pancevo_4.jpg" alt=""></div>
                    <div class="date_ct">
                        <i class="fi fi-rr-calendar"></i>
                        <div class="date">Sep 23, 2023</div>
                    </div>
                    <h3 class="blog_heading">Pančevački Letnji Festivali: Mesto Gde Se Događaju Najbolji Koncerti i Druženja.</h3>
                    <a href="" class="underline_btn red_btn">Pročitaj Više</a>
                </div> -->
            </div>
        </div>
    </div>

<?php require_once 'views/fixed/footer.php'?>