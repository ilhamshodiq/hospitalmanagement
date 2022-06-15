<?php
session_start();
include "../../koneksi.php";

if (isset($_POST['hapus'])) {
    $nama_ruangan = $_POST['nama_ruangan'];
    $query_l = "DELETE FROM ruangan WHERE nama_ruangan='$nama_ruangan'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Ruangan berhasil dihapus!');        
     </script>";
        header("Location:../admin_ruangan.php");
    } else {
        echo "<script> 
        alert('Ruangan gagal dihapus!');        
     </script>";
        header("Location:../admin_ruangan.php");
    }
}
