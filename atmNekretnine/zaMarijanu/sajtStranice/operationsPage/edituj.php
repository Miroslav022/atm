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
    <title>Edituj</title>
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

    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >

      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="admin.php">
              
              <!-- Logo text -->
              <span class="logo-text">
                <img
                  src="../../../assets/images/staticImages/logo.png"
                  class="logo"
                  alt="homepage"
                />
              </span>
            </a>
            
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>

          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            
            <ul class="navbar-nav float-start me-auto">

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
            
          </div>
        </nav>
      </header>

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
              <h4 class="page-title">Edituj</h4>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../ltr/admin.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Edituj
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
                <?php if($_GET['page']!=='oglas'):?>
                  <form action="logic/edit.php?page=<?=$_GET['page']?>&id=<?=$_GET['id']?>" method="POST"  onSubmit="return ValidateField('<?=$_GET['page']?>')" enctype="multipart/form-data">
                      <?php if($_GET['page']==='drzava'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "drzave", "id_drzava");   
                          ?>
                          <?php isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."!</div>" : ''?>
                          <div class="form-group">
                              <label for="drzava">Naziv Države</label>
                              <input type="text" class="form-control" name="drzava" id="drzava" value="<?=$item['drzava']?>">

                          </div>
                          <div id='drzavaError'></div>
                          <input type="hidden" name="table" value="drzave">
                      <?php elseif($_GET['page']==='grad'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "gradovi", "id_grad");   
                          ?>
                          <?php $drzave = getAllData('drzave') ?>
                          <div class="form-group">
                              <label for="grad">Naziv Grada</label>
                              <input type="text" class="form-control" id="grad" name="grad" value="<?=$item['grad']?>">
                          </div>
                          <div class="form-group">
                              <label for="drzava">Država</label>
                              <select class="form-control" name="drzava" id="drzava">
                              <?php foreach($drzave as $drzava):?>
                                  <option <?= $drzava['id_drzava']===$item['id_drzava'] ? 'selected' : '' ?> value="<?=$drzava['id_drzava']?>"><?=$drzava['drzava']?></option>
                              <?php endforeach;?>
                              </select>
                          </div>
                          <div id='gradError'></div>
                          <input type="hidden" name="table" value="gradovi">
                      <?php elseif($_GET['page']==='karakteristika'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "karakteristike", "id_karakteristike");   
                          ?>
                          <div class="form-group">
                              <label for="karakteristika">Naziv Karakteristike</label>
                              <input type="text" class="form-control" name="karakteristika" id="karakteristika" value="<?=$item['karakteristika']?>">
                          </div>
                          <div id='karakteristikaError'></div>
                          <input type="hidden" name="table" value="karakteristike">
                      <?php elseif($_GET['page']==='naselje'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "naselja", "id_naselja");   
                          ?>
                          <?php $gradovi = getAllData('gradovi') ?>
                          <div class="form-group">
                              <label for="naselje">Naziv Naselja</label>
                              <input type="text" class="form-control" id="naselje" name="naselje" value="<?=$item['naselje']?>">
                          </div>
                          <div class="form-group">
                              <label for="grad">Grad</label>
                              <select class="form-control" name="grad" id="grad">
                              <?php foreach($gradovi as $grad):?>
                                  <option <?= $grad['id_grad']===$item['id_grad'] ? 'selected' : '' ?> value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                              <?php endforeach;?>
                              </select>
                          </div>
                          <div id='naseljeError'></div>
                          <input type="hidden" name="table" value="naselja">
                      <?php elseif($_GET['page']==='usluge'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "tipovi_usluga", "id_tip_usluge");   
                          ?>
                          <div class="form-group">
                              <label for="usluga">Naziv Usluge</label>
                              <input type="text" class="form-control" name="usluga" id="usluga" value="<?=$item['usluga']?>">
                          </div>
                          <div id='uslugaError'></div>
                          <input type="hidden" name="table" value="usluge">
                      <?php elseif($_GET['page']==='tip-nekretnine'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "tipovi_nekretnine", "id_tip_nekretnine");   
                          ?>
                          <div class="form-group">
                              <label for="tip_nekretnine">Tip Nekretnine</label>
                              <input type="text" class="form-control" name="tip_nekretnine" id="tip_nekretnine" value="<?=$item['tip_nekretnine']?>">
                          </div>
                          <div id='tip-nekretnineError'></div>
                          <input type="hidden" name="table" value="tipovi_nekretnine">
                      <?php elseif($_GET['page']==='blog'):?>
                        <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                          <?php
                              $id = $_GET['id'];
                              $item = getSingleItem($id, "blogovi", "id_blog");   
                          ?>
                          <div class="form-group">
                            <label for="naslov">Naslov</label>
                            <input type="text" class="form-control" id="naslov" name="naslov" value="<?=$item['naslov']?>">
                          </div>
                          <div class="form-group">
                            <label for="content">Sadržaj</label>
                            <textarea id="content" name='sadrzaj'><?=$item['content']?></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="naslovna" class="form-label">Postavi Naslovnu Sliku</label>
                            <input class="form-control" type="file" id="naslovna" name="naslovna">
                            <div class="naslovna mt-3">
                            <img src="../../../assets/images/blog/<?=$item['main_blog_img']?>" alt="<?=$item['naslov']?> image">
                          </div>
                          </div>
                          <div id='naslovnaError'></div>
                          <div class="mb-3">
                            <label for="galerija" class="form-label">Postavi slike za galeriju</label>
                            <input class="form-control" type="file" id="galerija" name="galerija[]" multiple>
                            <p class="tag">Trenutne slike iz galerije</p>
                            <div class="galerija"></div>
                          </div>
                          <div id='galerijaError'></div>
                          <input type="hidden" id='id_blog' value="<?=$_GET['id']?>">
                          <input type="hidden" name="table" value="blogovi"> 
                      <?php endif;?>
                      <?= $_GET['page']==='oglas' ? "" : '<button type="submit" name="btn-add" class="btn btn-primary">Edituj</button>'?>
                  </form>
                <?php endif;?>
                <?php if($_GET['page']==='oglas'):?>
                      <?php echo isset($_GET['error']) ? "<div class='alert alert-danger' role='alert'> ".$_GET['error']."</div>" : ''?>
                      <!-- ITEM TO EDIT -->
                      <?php $oglas = getOglas($_GET['id'])?>
                      <?php $id_oglasa = $_GET['id']?>
                      <!-- DATA FOR SELECT TAG -->
                      <?php $gradovi = getAllData('gradovi')?>
                      <?php $naselja = getAllData('naselja')?>
                      <?php $tipovi_nekretnina = getAllData('tipovi_nekretnine')?>
                      <?php $tipovi_usluga = getAllData('tipovi_usluga')?>
                      <?php $karakteristike = getAllData('karakteristike')?>
                      <form action="logic/edit.php?page=<?=$_GET['page']?>&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data" onSubmit="return ValidateField('<?=$_GET['page']?>, 'edit'')">
                        <h3 class="mt-3">Oglas</h3>
                        <div class="form-group">
                            <label for="naslov">Naslov</label>
                            <input type="text" class="form-control" id="naslov" name="naslov" value="<?=$oglas['naslov']?>">
                        </div>
                        <div id='naslovError'></div>
                        <div class="form-group">
                            <label for="cena">Cena</label>
                            <input type="text" class="form-control" id="cena" name="cena" value="<?=$oglas['cena']?>">
                        </div>
                        <div id='cenaError'></div>
                        <div class="mb-3">
                          <label for="opis" class="form-label">Opis</label>
                          <textarea class="form-control" name="opis" id="opis" rows="3"><?=$oglas['opis']?></textarea>
                        </div>
                        <div id='opisError'></div>
                        <div class="form-group">
                            <label for="grad">Grad</label>                            
                            <select class="form-control" name="grad" id="grad">
                            <?php foreach($gradovi as $grad):?>
                              <?php echo $oglas['id_grad'];?>
                                <?php echo $grad['id_grad'];?>
                                <option <?= $grad['grad']===$oglas['grad'] ? 'selected' : '' ?> value="<?=$grad['id_grad']?>"><?=$grad['grad']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mapa_link">Link Google mape</label>
                            <input type="text" class="form-control" id="mapa_link" name="mapa_link" value="<?=$oglas['mapa_link']?>">
                        </div>
                        <div id='mapaError'></div>
                        <div class="form-group">
                            <label for="naselje">Naselje</label>
                            <select class="form-control" name="naselje" id="naselje">
                            <?php foreach($naselja as $naselje):?>
                                <option <?= $naselje['id_naselja']===$oglas['id_naselja']? "selected" : '' ?> value="<?=$naselje['id_naselja']?>"><?=$naselje['naselje']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ulica">Ulica</label>
                            <input type="text" class="form-control" id="ulica" name="ulica" value="<?=$oglas['ulica']?>">
                        </div>
                        <div id='ulicaError'></div>
                        <div class="form-group">
                            <label for="tip_nekretnine">Tip Nekretnine</label>
                            <select class="form-control" name="tip_nekretnine" id="tip_nekretnine">
                            <?php foreach($tipovi_nekretnina as $tip):?>
                                <option <?= $tip['id_tip_nekretnine']===$oglas['id_tip_nekretnine']? "selected" : '' ?> value="<?=$tip['id_tip_nekretnine']?>"><?=$tip['tip_nekretnine']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tip_usluga">Tip Usluga</label>
                            <select class="form-control" name="tip_usluge" id="tip_usluge">
                            <?php foreach($tipovi_usluga as $usluga):?>
                                <option <?= $usluga['id_tip_usluge']===$oglas['id_tip_usluge']? "selected" : '' ?> value="<?=$usluga['id_tip_usluge']?>"><?=$usluga['usluga']?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                          <label for="naslovna" class="form-label">Postavi Novu Naslovnu Sliku</label>
                          <input class="form-control" type="file" id="naslovna" name="naslovna">
                          <p class="tag">Trenutna naslovna slika</p>
                          <div class="naslovna">
                            <img src="../../../assets/images/naslovneSlikeOglas/<?=$oglas['naslovna_slika']?>" alt="">
                          </div>
                        </div>
                        <div id='naslovnaError'></div>
                        <button type="submit" name="btn-add" class="btn btn-primary mb-3">Edituj Oglas</button>
                        <input type="hidden" name="table" value="nekretnine">
                      </form>
                      <form action="logic/edit.php?page=<?=$_GET['page']?>&id=<?=$_GET['id']?>&table=slike_nekretnine" method="POST" enctype="multipart/form-data" onSubmit="return ValidateField('slike_nekretnine')">
                        <h3 class="mt-3">Slike iz galerije</h3>
                        <div class="mb-3">
                        <?php if(isset($_SESSION['user']['errorsGallery'])): ?>
                          <?php var_dump($_SESSION['user'])?>
                          <?php foreach($_SESSION['user']['errors'] as $error):?>
                            <p class='alert alert-danger'><?=$error?></p>
                          <?php endforeach?>
                        <?php endif;?> 
                          <label for="galerija" class="form-label">Postavi slike za galeriju</label>
                          <input class="form-control" type="file" id="galerija" name="galerija[]" multiple>
                          <button type="submit" name="btn-add" class="btn btn-primary mt-3 ">Dodaj slike za galeriju</button>
                          <p class="tag">Trenutne slike iz galerije</p>
                          <div class="galerija"></div>
                        </div>
                        <div id='galerijaError'></div>
                        <input type="hidden" name="table" value="slike_nekretnine">
                      </form>
                      <form action="#">
                      <div class="form-group">
                      <h3 class="mt-3">Karakteristike</h3>
                            <p class="tag">Dodaj novu karakteristiku</p>
                            <div class="input-wrapper">
                              <select class="form-select" id="add-karakteristika">
                                <?php foreach($karakteristike as $karakteristika):?>
                                  <option value="<?=$karakteristika['id_karakteristike']?>"><?=$karakteristika['karakteristika']?></option>
                                <?php endforeach;?>
                              </select>
                              <input type="text" class="form-control" id="karak-value">
                            </div>
                            <a href="#" class="btn btn-add-kar mt-3 btn-primary">Dodaj Karakteristuku</a>
                            <input type="hidden" id='id_og' value="<?=$_GET['id']?>">
                        </div>
                      </form>
                      
                      <form action="logic/edit.php?page=<?=$_GET['page']?>&id=<?=$_GET['id']?>&table=nekretnina_karakteristika"  method="POST">
                        <div class="single_karak">
                          
                          <!-- <?php foreach($karakteristike as $karakteristika):?>
                            <?php $value = getOglaskarakteristike($_GET['id'], $karakteristika['id_karakteristike'])?>
                            <?php if(isset($value['karakteristika'])):?>
                              
                              <div class="form-group">
                              <label for="<?=$karakteristika['karakteristika']?>"><?=$karakteristika['karakteristika']?></label>
                              <div class="karakteristika_block">
                                <input type="text" class="form-control" id="<?=$karakteristika['karakteristika']?>" name="karakteristika_<?=$karakteristika['id_karakteristike']?>" <?=isset($value['vrednost']) ? "value=".$value["vrednost"]."" : ""?>>
                                <a href="#" class="btn btn-remove-karak btn-danger" data-nk="<?=$value['id_nk']?>" data-og='<?=$_GET['id']?>'>Izbriši</a>
                              </div>
                              </div>  
                            <input type="hidden" name="nk_num<?=$karakteristika['id_karakteristike']?>" <?=isset($value['id_nk']) ? "value=".$value['id_nk']."" : "" ?> >
                            
                            <?php endif;?>
                          <?php endforeach;?> -->
                          
                              <!-- <div class="alert alert-danger alert-noContent" role="alert">
                                Oglas nema karakteristika!
                              </div> -->
                          
                        </div>
                        <div class="karakteristika_error"></div>
                        <input type="hidden" name="id_oglasa" id="id_oglasa" value="<?=$id_oglasa?>">
                        <button type="submit" name="btn-add" class="btn btn-primary">Edituj karakteristike oglasa</button>
                        <input type="hidden" name="table" value="nekretnina_karakteristika">
                      </form>
                <?php endif;?>
            </div>
          </div>
        </div>

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
