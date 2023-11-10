<?php
session_start();
        session_destroy(); 
        $_SESSION['status_login']=false;     
    echo "<script>alert('Logoout Berhasil'); location.href='index.php' </script>";
    
?>