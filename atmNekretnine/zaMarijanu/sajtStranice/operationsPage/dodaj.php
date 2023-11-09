<?php 
  session_start();
  if(!isset($_SESSION['user'])){
    header("Location:../../../index.php");
  }
  include '../../logic/functions.php'
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Dodavanje</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/xtreme-admin-lite/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../../../assets/images/icon/ATM__1_-removebg-preview.ico"
    />
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet" />
    <link href="../../src/scss/custom.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="admin.php">
              
              <!-- Logo text -->
              <span class="logo-text">
                <!-- dark Logo text -->
               
                <!-- Light Logo text -->
                <img
                  src="../../../assets/images/staticImages/logo.png"
                  class="logo"
                  alt="homepage"
                />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box">
                <a
                  class="nav-link waves-effect waves-dark"
                  href="javascript:void(0)"
                  ><i class="ti-search"></i
                ></a>
                <form class="app-search position-absolute">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search &amp; enter"
                  />
                  <a class="srh-btn"><i class="ti-close"></i></a>
                </form>
              </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../../assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="ti-user m-r-5 m-l-5"></i> My Profile</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i class="ti-email m-r-5 m-l-5"></i> Inbox</a
                  >
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <!-- User Profile-->
              <li>
                <!-- User Profile-->
                <div class="user-profile d-flex no-block dropdown m-t-20">
                  <a href="../../logic/odjava.php" class="btn btn-danger">Odjavi se</a>
                 
                </div>
                <!-- End User Profile-->
              </li>
              <!-- User Profile-->
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/pocetna.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/drzave.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-flag-variant"></i
                  ><span class="hide-menu">Upravljaj drzavama</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/gradovi.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-city"></i
                  ><span class="hide-menu">Upravljaj gradovima</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/karakteristike.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-settings"></i
                  ><span class="hide-menu">Upravljaj karakteristikama</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/naselja.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-label"></i
                  ><span class="hide-menu">Upravljaj naseljima</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/oglasi.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-home"></i
                  ><span class="hide-menu">Upravljaj oglasima</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/usluge.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-settings"></i
                  ><span class="hide-menu">Upravljaj uslugama</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/tipovi-nekretnine.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-settings"></i
                  ><span class="hide-menu">Upravljaj tipovima nekretnina</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="../ltr/blog.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-blogger"></i
                  ><span class="hide-menu">Upravljaj Blogovima</span></a
                >
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-5">
              <h4 class="page-title">Dodaj</h4>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../ltr/admin.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dodaj
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <div class="col-7">
              <div class="text-end upgrade-btn">
                <a
                  href="../../../index.php"
                  class="btn btn-danger text-white"
                  >Back to Home Page</a
                >
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
            <form action="logic/add.php" method="POST" enctype="multipart/form-data" onSubmit="return ValidateField('<?=$_GET['page']?>')">
                <?= isset($_GET['error']) ? "<p class='alert alert-danger'>".$_GET['error']."</p>" : '' ?>
                
                
                <?php if($_GET['page']==='drzava'):?>
                    <div class="form-group">
                        <label for="drzava">Naziv Države</label>
                        <input type="text" class="form-control" name="drzava" id="drzava">
                    </div>
                    <div id='drzavaError'></div>
                    <input type="hidden" name="table" value="drzave">
                <?php elseif($_GET['page']==='grad'):?>
                    <?php $drzave = getAllData('drzave') ?>
                    <div class="form-group">
                        <label for="grad">Naziv Grada</label>
                        <input type="text" class="form-control" id="grad" name="grad">
                    </div>
                    <div class="form-group">
                        <label for="drzava">Država</label>
                        <select class="form-control" name="drzava" id="drzava">
                        <?php foreach($drzave as $drzava):?>
                            <option value="<?=$drzava['id_drzava']?>"><?=$drzava['drzava']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div id='gradError'></div>
                    <input type="hidden" name="table" value="gradovi">
                <?php elseif($_GET['page']==='karakteristika'):?>
                    <div class="form-group">
                        <label for="karakteristika">Naziv Karakteristike</label>
                        <input type="text" class="form-control" name="karakteristika" id="karakteristika">
                    </div>
                    <div id='karakteristikaError'></div>
                    <input type="hidden" name="table" value="karakteristike">
                <?php elseif($_GET['page']==='naselje'):?>
                    <?php $gradovi = getAllData('gradovi') ?>
                    <div class="form-group">
                        <label for="naselje">Naziv Naselja</label>
                        <input type="text" class="form-control" id="naselje" name="naselje">
                    </div>
                    <div class="form-group">
                        <label for="grad">Grad</label>
                        <select class="form-control" name="grad" id="grad">
                        <?php foreach($gradovi as $grad):?>
                            <option value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div id='naseljeError'></div>
                    <input type="hidden" name="table" value="naselja">
                <?php elseif($_GET['page']==='usluge'):?>
                    <div class="form-group">
                        <label for="usluga">Naziv Usluge</label>
                        <input type="text" class="form-control" name="usluga" id="usluga" >
                    </div>
                    <div id='uslugaError'></div>
                    <input type="hidden" name="table" value="usluge">
                <?php elseif($_GET['page']==='tip-nekretnine'):?>
                    <div class="form-group">
                        <label for="tip_nekretnine">Tip Nekretnine</label>
                        <input type="text" class="form-control" name="tip_nekretnine" id="tip_nekretnine">
                    </div>
                    <div id='tip-nekretnineError'></div>
                    <input type="hidden" name="table" value="tipovi_nekretnine">
                <?php elseif($_GET['page']==='oglas'):?> 
                  <?php $gradovi = getAllData('gradovi')?>
                  <?php $naselja = getAllData('naselja')?>
                  <?php $tipovi_nekretnina = getAllData('tipovi_nekretnine')?>
                  <?php $tipovi_usluga = getAllData('tipovi_usluga')?>
                  <?php $karakteristike = getAllData('karakteristike')?>

                  <?php if(isset($_SESSION['user']['errors'])): ?>
                    <?php foreach($_SESSION['user']['errors'] as $error):?>
                      <p class='alert alert-danger'><?=$error?></p>
                    <?php endforeach?>
                  <?php endif;?>
                    <div class="form-group">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" id="naslov" name="naslov">
                    </div>
                    <div id='naslovError'></div>
                    <div class="form-group">
                        <label for="cena">Cena</label>
                        <input type="text" class="form-control" id="cena" name="cena">
                    </div>
                    <div id='cenaError'></div>
                    <div class="mb-3">
                      <label for="opis" class="form-label">Opis</label>
                      <textarea class="form-control" name="opis" id="opis" rows="3"></textarea>
                    </div>
                    <div id='opisError'></div>
                    <div class="form-group">
                        <label for="grad">Grad</label>
                        <select class="form-control" name="grad" id="grad">
                        <?php foreach($gradovi as $grad):?>
                            <option value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mapa_link">Link Google mape</label>
                        <input type="text" class="form-control" id="mapa_link" name="mapa_link">
                    </div>
                    <div id='mapaError'></div>
                    <div class="form-group">
                        <label for="naselje">Naselje</label>
                        <select class="form-control" name="naselje" id="naselje">
                        <?php foreach($naselja as $naselje):?>
                            <option value="<?=$naselje['id_naselja']?>"><?=$naselje['naselje']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ulica">Ulica</label>
                        <input type="text" class="form-control" id="ulica" name="ulica" >
                    </div>
                    <div id='ulicaError'></div>
                    <div class="form-group">
                        <label for="tip_nekretnine">Tip Nekretnine</label>
                        <select class="form-control" name="tip_nekretnine" id="tip_nekretnine">
                        <?php foreach($tipovi_nekretnina as $tip):?>
                            <option value="<?=$tip['id_tip_nekretnine']?>"><?=$tip['tip_nekretnine']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tip_usluga">Tip Usluga</label>
                        <select class="form-control" name="tip_usluge" id="tip_usluge">
                        <?php foreach($tipovi_usluga as $usluga):?>
                            <option value="<?=$usluga['id_tip_usluge']?>"><?=$usluga['usluga']?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="naslovna" class="form-label">Postavi Naslovnu Sliku</label>
                      <input class="form-control" type="file" id="naslovna" name="naslovna">
                    </div>
                    <div id='naslovnaError'></div>
                    <div class="mb-3">
                      <label for="galerija" class="form-label">Postavi slike za galeriju</label>
                      <input class="form-control" type="file" id="galerija" name="galerija[]" multiple>
                    </div>
                    <div id='galerijaError'></div>
                    <?php foreach($karakteristike as $karakteristika):?>
                      <div class="form-group">
                        <label for="<?=$karakteristika['karakteristika']?>"><?=$karakteristika['karakteristika']?></label>
                        <input type="text" class="form-control" id="<?=$karakteristika['karakteristika']?>" name="karakteristika_<?=$karakteristika['id_karakteristike']?>">
                      </div>  
                    <?php endforeach;?>
                    <input type="hidden" name="table" value="nekretnine">
                <?php elseif($_GET['page']==='blog'):?>

                  <?php if(isset($_SESSION['user']['errors'])): ?>
                    <?php foreach($_SESSION['user']['errors'] as $error):?>
                      <p class='alert alert-danger'><?=$error?></p>
                    <?php endforeach?>
                  <?php endif;?>
                    <div class="form-group">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" id="naslov" name="naslov" >
                    </div>
                    <div class="form-group">
                      <label for="content">Sadržaj</label>
                      <textarea id="content" name='sadrzaj'>Hello, World!</textarea>
                    </div>
                    <div class="mb-3">
                      <label for="naslovna" class="form-label">Postavi Naslovnu Sliku</label>
                      <input class="form-control" type="file" id="naslovna" name="naslovna">
                    </div>
                    <div id='naslovnaError'></div>
                    <div class="mb-3">
                      <label for="galerija" class="form-label">Postavi slike za galeriju</label>
                      <input class="form-control" type="file" id="galerija" name="galerija[]" multiple>
                    </div>
                    <div id='galerijaError'></div>
                    <input type="hidden" name="table" value="blogovi"> 
                <?php endif;?>
                    <button type="submit" name="btn-add" class="btn btn-primary">Dodaj</button>
            </form>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          All Rights Reserved by Xtreme Admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.js"></script>
  </body>
</html>
