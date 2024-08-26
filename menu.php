<?php 
require 'functions.php';
$category = [
  'bigcake' => '1BC',
  'minicake' => '2MC',
  'shortcake' => '3SC',
  'cupcake' => '4CC',
  'slicecake' => '5SL',
  'others' => '6OH'
];
$results = [];
foreach ($category as $key => $category_id) {
  $results[$key] = query("SELECT * FROM products
                          JOIN gambar ON products.product_id = gambar.product_id
                          WHERE category_id = '$category_id'");
}

$categories = query("SELECT * FROM product_category");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OISHIIKE-KI | Menu</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
        <a class="navbar-brand brand" href="index.php">OISHIIKE-KI</a>
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
              <a class="nav-link brand active" aria-current="page" href="menu.php"
                >Menu</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link brand" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link brand" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- start judul -->
    <h1 class="judul-menu">OISHIIKE-KI MENU</h1>
    <div class="kategori">
      <?php foreach ($categories as $category): ?>
        <?php $categoryLower = strtolower($category["category_name"]); ?>
        <button onclick="showContent('<?= $categoryLower; ?>')"><?= $category["category_name"]; ?></button>      
      <?php endforeach; ?>
    </div>
    <!-- end judul -->

    <!-- start main -->
    <?php foreach ($results as $category => $products): ?>
      <?php if ($category == 'bigcake'): ?>
        <div class="container main-menu content active" id="<?= $category; ?>">
      <?php else: ?>
        <div class="container main-menu content" id="<?= $category; ?>">
      <?php endif; ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php foreach ($products as $product): ?>
            <div class="col">
              <div class="card rounded-4">
                <div class="img-container">
                  <img src="assets/image/menu/<?= $product["gambar"]; ?>" class="card-img img-card" alt="..."/>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?= $product["product_name"]; ?></h5>
                  <p class="card-text">Rp<?= $product["price"]; ?>.000</p>
                  <a href="purchase.php?product_name=<?= urlencode($product["product_name"]); ?>&product_image=<?= urlencode($product["gambar"]); ?>&product_price=<?= urlencode($product["price"]); ?>" class="buy-now btn-buy-now-menu">BUY NOW</a>
                </div>
              </div>
            </div>  
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
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
