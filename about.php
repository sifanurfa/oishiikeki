<?php 
require 'functions.php';
$categories = query("SELECT * FROM product_category");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OISHIIKE-KI | About Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="about.css" />
    <link rel="stylesheet" href="contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="body">
    <!-- start navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow">
      <div class="container">
        <a class="navbar-brand brand" href="index.html">OISHIIKE-KI</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link brand" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link brand" href="menu.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brand active" aria-current="page" href="about.php"
                >About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brand" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- start main -->
    <div class="container main" id="">
      <div class="row">
        <h1>About Us</h1>
        <h6>A fresh bakery shop</h6>
      </div>
      <div class="row main-row">
        <div class="col-sm-6 paragraf">
          <p>OISHIIKE-KI adalah toko kue premium yang menawarkan berbagai macam kue lezat dengan cita rasa autentik. Terletak di pusat kota, toko kue ini menjadi destinasi favorit bagi para pencinta kue. Dengan menggunakan bahan-bahan berkualitas tinggi dan resep-resep tradisional yang diwariskan dari generasi ke generasi, OISHIIKE-KI menjamin setiap kue yang diproduksi memiliki rasa yang istimewa dan tak terlupakan. Selain itu, toko ini dikenal dengan pelayanan ramah dan suasana toko yang hangat, menjadikannya tempat yang sempurna untuk menikmati kue bersama keluarga dan teman.</p>
        </div>
        <div class="col-sm-6 paragraf">
          <img src="assets/image/about.jpg" class="gambar" alt="">
        </div>
      </div>
      <div class="row main-row">
        <div class="col-sm-6 paragraf">
          <img src="assets/image/about2.jpg" class="gambar" alt="">
        </div>
        <div class="col-sm-6 paragraf">
          <p>OISHIIKE-KI juga menawarkan berbagai varian kue untuk setiap kesempatan, mulai dari kue ulang tahun yang meriah hingga kue pernikahan yang elegan. Setiap kue dapat disesuaikan dengan keinginan pelanggan, termasuk pilihan rasa, ukuran, dan dekorasi. Toko ini juga menyediakan layanan pesan antar, memudahkan pelanggan untuk menikmati kue favorit mereka kapan saja dan di mana saja. Dengan komitmen pada kualitas dan kepuasan pelanggan, OISHIIKE-KI terus berusaha untuk menjadi toko kue terbaik di kota, menghadirkan kebahagiaan melalui setiap potongan kue yang disajikan.</p>
        </div>
      </div>
    </div>
    <!-- end main -->

    <!-- start footer -->
    <div class="container-fluid footer">
      <div class="row">
        <div class="col-sm-3">
          <h4 class="brand">OISHIIKE-KI</h4>
          <ul>
            <li><a href="menu.php">Our Menus</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h4 class="brand">OUR CAKE</h4>
          <ul>
            <?php foreach ($categories as $category): ?>
              <li><?= $category["category_name"]; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-sm-3">
          <h4 class="brand">OPENING</h4>
          <ul>
            <li class="jadwal">
              <p>Monday-Saturday</p>
              <p>09AM-09PM</p>
            </li>
            <li class="jadwal">
              <p>Sunday</p>
              <p>10AM-08PM</p>
            </li>
          </ul>
        </div>
        <div class="col-sm-3">
          <h4 class="brand">CONTACT</h4>
          <ul class="phone-email">
            <li><img src="assets/icon/phone.png" class="icon-contact" alt=""> 085876712488</li>
            <li><img src="assets/icon/email.png" class="icon-contact" alt=""> oishii@mail.com</li>
          </ul>
          <div class="footer-sosmed">
            <ul>
              <li><a href=""><img src="assets/icon/facebook.png" class="icon-sosmed" alt=""></a></li>
              <li><a href=""><img src="assets/icon/linkedin.png" class="icon-sosmed" alt=""></a></li>
              <li><a href=""><img src="assets/icon/twitter.png" class="icon-sosmed" alt=""></a></li>
              <li><a href=""><img src="assets/icon/instagram.png" class="icon-sosmed" alt=""></a></li>
          </div>
        </div>
      </div>
    </div>
    <!-- end footer -->

    <a href="#" class="arrow"><img src="assets/icon/arrow.png"></a>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="index.js"></script>
  </body>
</html>
