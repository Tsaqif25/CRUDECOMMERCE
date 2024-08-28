<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>R30 Store - Home</title>
  <link rel="icon" href="assets/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="?page=home/index">
            <h1>R30 Store</h1>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="?page=home/index">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="?page=produk/index">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="?page=keranjang/index">Keranjang</a></li>
                  <li class="nav-item"><a class="nav-link" href="?page=checkout/index">Checkout Barang</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Status Pemesanan</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="?page=checkout/detail_co">Lihat Status</a></li>

                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="?page=kontak/index">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><a href="?page=keranjang/index"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </a></li>
              <?php
              if (!isset($_SESSION['id_user'])) {
              ?>
                <li class="nav-item"><a class="nav-link" href="admin/?page=login/index">Login</a>
                <li class="nav-item"><a class="nav-link" href="admin/?page=signup/index">Register</a></li>
              <?php
              } else {
              ?>
                <ul class="drop-item"> <a class="nav-link" href="login/logout.php">logout </a></ul>
              <?php } ?>


              </li>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->