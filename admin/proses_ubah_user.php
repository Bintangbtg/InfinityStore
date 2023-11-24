<?php
if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $telp=$_POST['telp'];
    $pw=$_POST['pw'];
    $role=$_POST['role'];

    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } elseif(empty($pw)){
        echo "<script>alert('password tidak boleh kosong');location.href='ubah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($nama)){
            $update=mysqli_query($conn,"update pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."', password='".$pw."', role='".$role."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
            }
        } else {
            $update=mysqli_query($conn,"update pelanggan set nama='".$nama."', alamat='".$alamat."', telp='".$telp."', password='".$pw."', role='".$role."' where id_pelanggan = '".$id_pelanggan."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update pelanggan');location.href='tampil.php';</script>";
            } else {
                echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_produk=".$id_pelanggan."';</script>";
            }
        }
        
    } 
}
?>
