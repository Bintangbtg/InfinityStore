<?php
  session_start();
  if($_SESSION['status_login']!=true){
    $_SESSION['status_login']=false;
  }
  else{
    $_SESSION['status_login']=true;
  }
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title></title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

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
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
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
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">    
    <title>Toko Online</title>
</head>
<body>        
    <a style="display:block;width:max;background-color:green" class="btn btn-primary" href="./tambah_produk.php">Click Disini Untuk Menambahkan Produk</a>
    <a style="display:block;width:max" class="btn btn-primary" href="./tambah_pelanggan.php">Click Disini Untuk Menambahkan User</a>   
    <center><h3 class="display-5">Daftar Produk</h3></center>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th><th>NAMA PRODUK</th><th>DESKRIPSI</th><th>HARGA</th><th>FOTO PRODUK</th>       
            </tr>
        </thead>
 <tbody>
    <?php
    include "koneksi.php";
    $qry_produk = mysqli_query($conn, "select * from produk");       
    while($data_produk=mysqli_fetch_array($qry_produk)){
    ?>        
        <tr> 
        <td><?=$data_produk['id_produk']?></td>
        <td><?=$data_produk['nama_produk']?></td>
        <td><?=$data_produk['deskripsi']?></td>
        <td><?=$data_produk['harga']?></td>
        <td><img width=25%, height=25% src="assets/foto_produk/<?=$data_produk['foto_produk']?>"></td>
        <td><a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Ubah</a> 
        |<a href="hapus.php?id_produk=<?=$data_produk['id_produk']?>"onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>                        
        </tr>        
        <?php
    }
    ?>
 </tbody>
 </table>

 <center><h3 class="display-5">Daftar User</h3></center>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th><th>NAMA</th><th>ALAMAT</th><th>TELEPON</th><th>ROLE</th>       
            </tr>
        </thead>
 <tbody>
    <?php
    include "koneksi.php";
    $qry_pelanggan = mysqli_query($conn, "select * from pelanggan");
    $no=0;           
    while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
        $no++;?>        
        <tr> 
        <td><?=$data_pelanggan['id_pelanggan']?></td>
        <td><?=$data_pelanggan['nama']?></td>
        <td><?=$data_pelanggan['alamat']?></td>
        <td><?=$data_pelanggan['telp']?></td>
        <td><?=$data_pelanggan['role']?></td>
        <td> <a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success">Ubah</a>
        |<a href="hapus.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>"onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>                        
        </tr>        
        <?php
    }
    ?>
 </tbody>
 </table>

 <a href="logout.php">LOGOUT</a>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>