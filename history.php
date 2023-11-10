<?php 
session_start();
if($_SESSION['status_login']!=true){
  header('login.php');
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
              <li class="nav-item active">
                <a class="nav-link" href="history.php">History<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
              <?php 
                if($_SESSION['status_login']!=true){?>
                  <a class="nav-link" href="login.php">Login</a>
                <?php }
                else{?>
                  <a class="nav-link" href="logout.php">Logout</a>
                <?php }
                ?>
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
<h2> Histori Pembelian</h2>
</center>

<table class="table table-hover table-striped">
    <thead>
        <th>NO</th>
        <th>Tanggal Beli</th>
        <th>Nama Produk</th>
        <th>Total</th>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        $qry_histori = mysqli_query($conn, "select * from transaksi order by id_transaksi desc");
        $no = 0;
        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
            $no++;
            $qry_produk = mysqli_query($conn, "select * from detail_transaksi join produk on produk.id_produk = detail_transaksi.id_produk where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
            
            $total = 0; // Inisialisasi total belanja

            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $dt_histori['tanggal'] . "</td>";
            echo "<td><ol>";

            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk_dibeli = $dt_produk['nama_produk'];
                $total_produk = $dt_produk['harga'] * $dt_produk['qty'];
                $jumlah_produk = $dt_produk['qty'];

                $total += $total_produk; // Menambahkan total produk ke total belanja

                echo "<li>" . $produk_dibeli . " (Jumlah: " . $jumlah_produk . ")</li>";
            }

            echo "</ol></td>";
            echo "<td>Rp " . number_format($total) . "</td>";
            echo "</tr>";
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