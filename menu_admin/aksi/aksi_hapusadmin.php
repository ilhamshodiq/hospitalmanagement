<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $username = $_POST['username_admin'];
    $query_l = "DELETE FROM admin WHERE username='$username'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Akun admin berhasil dihapus!');        
     </script>";
        header("Location:../admin_akunadmin.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:../admin_akunadmin.php");
    }
}
