<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $username = $_POST['username'];
    $query_l = "DELETE FROM dokter WHERE username='$username'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Akun admin berhasil dihapus!');        
     </script>";
        header("Location:../admin_akundokter.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:../admin_akundokter.php");
    }
}
