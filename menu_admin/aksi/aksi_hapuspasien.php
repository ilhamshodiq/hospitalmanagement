<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $username = $_POST['username'];
    $query_l = "DELETE FROM pasien WHERE username='$username'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Akun admin berhasil dihapus!');        
     </script>";
        header("Location:../admin_akunpasien.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:../admin_akunpasien.php");
    }
}
