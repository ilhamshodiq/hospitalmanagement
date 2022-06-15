<?php
session_start();
include "../../koneksi.php";

if (isset($_POST['hapus'])) {
    $nama_obat = $_POST['nama_obat'];
    $query_l = "DELETE FROM obat WHERE nama_obat='$nama_obat'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('obat berhasil dihapus!');        
     </script>";
        header("Location:../admin_obat.php");
    } else {
        echo "<script> 
        alert('obat gagal dihapus!');        
     </script>";
        header("Location:../admin_obat.php");
    }
}
