<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
        /* Style untuk sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding-top: 3.5rem;
            background-color: #333;
            color: #fff;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 8px 16px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar ul li a:hover {
            color: #17a2b8;
        }

        /* Style untuk konten */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
<body>
        <!-- Sidebar -->
    <div class="sidebar">
        <ul>
            <li><a href="tampil.php">Dashboard</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>

    <!-- Konten -->
    <div class="content">
    <a style="display:block;width:max;background-color:green" class="btn btn-primary" href="./tambah_produk.php">Click Disini Untuk Menambahkan Produk</a>   
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
        <td>
        <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Ubah</a>
        |<a href="hapus.php?id_produk=<?=$data_produk['id_produk']?>"onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>                        
        </tr>        
        <?php
    }
    ?>
 </tbody>
 </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>