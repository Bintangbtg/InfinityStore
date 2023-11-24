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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Sidebar</title>
  <!-- Bootstrap CSS -->
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
</head>

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
        <h1>Halaman Admin</h1>
        <p>Selamat datang di halaman admin!</p>
    </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
