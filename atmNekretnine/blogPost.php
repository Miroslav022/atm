<?php
    include 'models/function.php';
    $blog = getSingleBlog($_GET['id']);
    $slike = getBlogImages($_GET['id']);
    $limitedBlog = getLimitedBlog(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="index"/>
    <meta name="description" content="<?=$blog['naslov']?>"/>
    <!-- Browser Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icon/ATM__1_-removebg-preview.ico"/>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <!-- Icons -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'/>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'/>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'/>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <title>ATM Nekretnine Pancevo • <?=$blog['naslov']?></title>
</head>
<body>
<?php include 'views/fixed/navigation.php'?>
    <div class="nekretnine_header blog_header">
        <div class="full_overlay"></div>
        <div class="container">
            <div class="single_nek">
                <div class="header_naslov">
                    <div class="v-line"></div>
                    <h1 class="page_h1"><?=$blog['naslov']?></h1>
                </div>
                <div class="path">
                    <p>Početna &gt; Blog &gt; <?=$blog['naslov']?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row blog_show">
            <div class="post col-lg-7 col-sm-12">
                <div class="blog_content">
                    <h2 class="page_h2"><?=$blog['naslov']?></h2>
                    <?=$blog['content']?>
                </div>
            </div>
            <div class="recent_blogs col-lg-5 col-sm-12">
                <span class="side_heading">Najnoviji Članci</span>
                <?php foreach($limitedBlog as $blog):?>
                    <a href="blogPost.php?id=<?=$blog["id_blog"]?>" class="linkBlog">
                <div class="recent_blog">
                    <div class="recent_img_blog_holder">
                        <img src="assets/images/blog/<?=$blog['main_blog_img']?>" alt="<?=$blog['naslov']?> image"/>
                    </div>
                    <div class="recent_blog_info">
                        <span class="rc_blog_name"><?=$blog['naslov']?></span>
                        <div class="date_ct">
                            <i class="fi fi-rr-calendar"></i>
                            <p class="date"><?=$blog['created_at']?></p>
                        </div>
                    </div>
                </div>
                </a>
                <?php endforeach;?>
                
            </div>
        </div>
        <div class="row ">
            <div class="col-12 slider">
                <div class="slider-for slide img_slider">
                    <?php foreach($slike as $slika):?>
                    <a class="example-image-link" href="assets/images/blog/<?=$slika['src']?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image d-block w-100 img" src="assets/images/blog/<?=$slika['src']?>" alt="slika<?=$slika['id_blog_img']?>"/></a> 
                    <?php endforeach;?>
                   
                </div>
                <div class="slider-nav slide img_slider">
                    <?php foreach($slike as $slika):?>
                    <div><img class="example-image d-block w-100 img" src="assets/images/blog/<?=$slika['src']?>" alt="slika<?=$slika['id_blog_img']?>"/></div>
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
        <div class="row blog_none">
        <div class="recent_blogs col-lg-5 col-sm-12">
                <span class="side_heading">Najnoviji Članci</span>
                <?php foreach($limitedBlog as $blog):?>
                <a href="blogPost.php?id=<?=$blog["id_blog"]?>" class="linkBlog">
                
                <div class="recent_blog">
                    <div class="recent_img_blog_holder">
                        <img src="assets/images/blog/<?=$blog['main_blog_img']?>" alt="<?=$blog['naslov']?> image"/>
                    </div>
                    <div class="recent_blog_info">
                        <span class="rc_blog_name"><?=$blog['naslov']?></span>
                        <div class="date_ct">
                            <i class="fi fi-rr-calendar"></i>
                            <p class="date"><?=$blog['created_at']?></p>
                        </div>
                    </div>
                </div>
                </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    
    
    
<?php require_once 'views/fixed/footer.php'?>