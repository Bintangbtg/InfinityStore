<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
    <title></title>
  </head>
  <body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Infinity Store
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="testimonial.php">Testimonial</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="history.php">History</a>
              </li>
            </ul>
            <div class="user_optio_box">
              <a href="keranjang.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

<center>
<body style="background-color: #white">
<h2>Daftar Produk di Keranjang</h2>
</center>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
<?php
include "koneksi.php";

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // $totalBelanja = 0;
    // $hargaProdukArray = array();
    // foreach ($_SESSION['cart'] as $key_produk => $val_produk) {
    //     $qry_produk = "SELECT harga FROM produk WHERE id_produk = $key_produk";
    //     $result = mysqli_query($conn, $qry_produk);
    //     if ($result) {
    //         $row = mysqli_fetch_assoc($result);
    //         $hargaProdukArray[$key_produk] = $row['harga'];
    //     }
    // }
    foreach ($_SESSION['cart'] as $key_produk => $val_produk):
        ?>
        <tr>
            <td><?= ($key_produk + 1) ?></td>
            <td><?= $val_produk['nama_produk'] ?></td>
            <td><?= $val_produk['qty'] ?></td>
            <td><a href="hapus_cart.php?id=<?= $key_produk ?>" class="btn btn-danger"><strong>X</strong></a></td>
        </tr>
        <?php
        // $hargaProduk = $hargaProdukArray[$key_produk];
        // $subtotal = $hargaProduk * $val_produk['qty'];
        // $totalBelanja += $subtotal;
    endforeach;
    ?>
    <a href="checkout.php" class="btn btn-primary">BELI</a>
    <!-- <tr>
        <td colspan="3">TOTAL :</td>
        <td>Rp </td>
    </tr> -->
    <?php
} else {
    echo "Tidak ada produk di dalam keranjang";
}
?>
    </tbody>
</table>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>