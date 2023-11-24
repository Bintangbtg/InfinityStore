<?php 
        include "koneksi.php";
        $qry_hapusproduk=mysqli_query($conn,"delete from produk where id_produk='".$_GET['id_produk']."'");
        if($qry_hapusproduk){
            echo "<script>alert('Sukses hapus data');location.href='tampil.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data');location.href='tampil.php';</script>";
        }
        $qry_hapususer=mysqli_query($conn,"delete from pelanggan where id_pelanggan='".$_GET['id_pelanggan']."'");
        if($qry_hapuspelanggan){
            echo "<script>alert('Sukses hapus data');location.href='tampil.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data');location.href='tampil.php';</script>";
        }
?>
