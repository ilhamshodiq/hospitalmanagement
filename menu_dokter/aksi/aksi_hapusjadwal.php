<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $id_jadwal_dokter = $_POST['id_jadwal_dokter'];
    $query_l = "DELETE FROM jadwal_dokter WHERE id_jadwal_dokter='$id_jadwal_dokter'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('Jadwal berhasil dihapus!');        
     </script>";
        header("Location:../dokter_jadwal.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:../dokter_jadwal.php");
    }
}
