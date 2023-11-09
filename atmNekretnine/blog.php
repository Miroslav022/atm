<?php
    include 'models/function.php';
    $blogs = getBlogs();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name=”robots” content="index"/>
    <meta name="description" content="Dobrodošli na mesto gde se dešavanja u Pančevu i okolini oživljavaju! Naša blog platforma je vaša centralna tačka za praćenje svega što se događa u ovom regionu. Pregledajte najnovije vesti, događaje, kulturne manifestacije, sportske aktivnosti i još mnogo toga."/>
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
    <title>ATM Nekretnine Pancevo • Blogs</title>
</head>
<body>
<?php include 'views/fixed/navigation.php'?>
    <div class="nekretnine_header blog_header">
        <div class="full_overlay"></div>
        <div class="container">
            <div class="single_nek">
                <div class="header_naslov">
                    <div class="v-line"></div>
                    <h1 class="page_h1">Blog</h1>
                </div>
                <div class="path">
                    <p>Početna &gt; Blog &gt;</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="istaknuti_blogovi">
            <div class="h2-block">
                <h2 class="H2podnaslov">Svi Naši Blogovi</h2>
                <div class="h2Line"></div>
                <p class="podnaslov blog_podnaslov">Posetite naš blog i uživaje u pažljivo napisanim člancima</p>
            </div>
            <div class="blog_container blog_page">
                <?php foreach($blogs as $blog):?>
                <div class="single_blog">
                    <div class="img_blog_holder"><img src="assets/images/blog/<?=$blog['main_blog_img']?>" alt="<?=$blog['naslov']?> image"/></div>
                    <div class="date_ct">
                        <i class="fi fi-rr-calendar"></i>
                        <div class="date"><?=$blog['created_at']?></div>
                    </div>
                    <h3 class="blog_heading"><?=$blog['naslov']?></h3>
                    <a href="blogPost.php?id=<?=$blog['id_blog']?>" class="underline_btn red_btn">Pročitaj Više</a>
                </div>
                <?php endforeach;?>
                
            </div>
        </div>
        <div class="arrows text-center mt-5">
            <img src="assets/images/staticImages/straight-left-arrow.png" class="back" alt="move back icon"/>
            <img src="assets/images/staticImages/straight-right-arrow.png" class="next" alt="move next icon"/>
        </div>
    </div>
    
<?php require_once 'views/fixed/footer.php'?>