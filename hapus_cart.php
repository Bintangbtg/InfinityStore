<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>

<?php
    session_start();
    unset($_SESSION['cart'][$_GET['id']]);
    header('location: keranjang.php');
?>
