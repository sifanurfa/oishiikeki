<?php 
require 'functions.php';

if(isset($_POST['proses'])){
    $jumlah_product = $_POST['jumlahProduct'];
    $product_name = $_POST['productName'];

    $query_stock = mysqli_query($conn, "SELECT stock FROM stock
                                        JOIN products ON products.product_id = stock.product_id
                                        WHERE product_name = '$product_name'");
    $stock_data = mysqli_fetch_assoc($query_stock);
    $current_stock = $stock_data['stock'];
    
    if ($jumlah_product > $current_stock) {
        echo '<script>alert("Maaf, jumlah yang dipesan melebihi stok yang tersedia."); window.location.href = "menu.php";</script>';
        exit;
    }
    
    mysqli_query($conn, "INSERT INTO orders SET  
      product_name = '$_POST[productName]',
      quantity = '$jumlah_product',
      customer_name = '$_POST[customerName]',
      customer_phone = '$_POST[customerPhone]',
      alamat = '$_POST[customerAddress]'"
    );
  
    mysqli_query($conn, "UPDATE stock 
                        JOIN products ON products.product_id = stock.product_id
                        SET stock = stock - '$jumlah_product'
                        WHERE product_name = '$product_name'"
    );
  
    header('Location: thanks.php');
}
  
  $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : '';
  $product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';
  $product_image = isset($_GET['product_image']) ? $_GET['product_image'] : '';
  $product_price = isset($_GET['product_price']) ? $_GET['product_price'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OISHIIKE-KI | Purchase</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="purchase.css">
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"/>
</head>
<body>
  <div class="container">
    <h5 class="brand">OISHIIKE-KI</h5>
    <h1>Purchase Form</h1>
    <div class="row">
        <a href="menu.php" class="back"><img src="assets/icon/back.png" alt=""> back to menu</a>
    </div>
    <div class="row">
        <!-- start card -->
        <div class="col-sm-5">
            <div class="card rounded-4">
              <div class="img-container">
                <img src="assets/image/menu/<?= htmlspecialchars($product_image); ?>" class="card-img-top" alt="Product Image">
              </div>
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($product_name); ?></h5>
                <p class="card-text">Rp<?= htmlspecialchars($product_price); ?>.000</p>
              </div>
            </div>
        </div>
        <!-- end card -->

        <!-- start form -->
        <div class="col-sm-7">
            <form action="purchase.php" method="post">
              <div>
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" value="<?= htmlspecialchars($product_name); ?>" readonly>
              </div>
              <div>
                <label for="jumlahProduct" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlahProduct" name="jumlahProduct" required>
              </div>
              <div>
                <label for="customerName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="customerName" name="customerName" required>
              </div>
              <div>
                <label for="customerPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="customerPhone" name="customerPhone" required>
              </div>
              <div>
                <label for="customerAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="customerAddress" name="customerAddress" required></input>
              </div>
              <div>
                <label for="totalPrice" class="form-label">Total Price</label>
                <input type="text" class="form-control" id="totalPrice" readonly>
              </div>
              <button type="submit" class="input submit" name="proses">SUBMIT</button>
            </form>
        </div>
        <!-- end form -->
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var productPrice = <?= htmlspecialchars($product_price); ?>;
      var jumlahProduct = document.getElementById('jumlahProduct');
      var totalPrice = document.getElementById('totalPrice');

      jumlahProduct.addEventListener('input', function() {
        var quantity = parseInt(jumlahProduct.value) || 0;
        totalPrice.value = 'Rp' + (quantity * productPrice) + '.000';
      });
    });
  </script>
</body>
</html>
