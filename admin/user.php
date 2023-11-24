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
        
    <a style="display:block;width:max" class="btn btn-primary" href="./tambah_pelanggan.php">Click Disini Untuk Menambahkan User</a>
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
        <td> <a href="ubah_user.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success">Ubah</a>
        |<a href="hapus.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>"onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>                        
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