<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $nama_poliklinik = $_POST['nama_poliklinik'];
    $query_l = "DELETE FROM poliklinik WHERE nama_poliklinik='$nama_poliklinik'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Poliklinik berhasil dihapus!');        
     </script>";
        header("Location:../admin_poliklinik.php");
    } else {
        echo "<script> 
        alert('Poliklinik gagal dihapus!');        
     </script>";
        header("Location:../admin_poliklinik.php");
    }
}
