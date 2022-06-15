<?php
session_start();
include "../../koneksi.php";


if (isset($_POST['hapus'])) {
    $id_diagnosa = $_POST['id_diagnosa'];
    $query_l = "DELETE FROM diagnosa WHERE id_diagnosa='$id_diagnosa'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('diagnosa berhasil dihapus!');        
     </script>";
        header("Location:../dokter_diagnosa.php");
    } else {
        echo "<script> 
        alert('Akun admin gagal dihapus!');        
     </script>";
        header("Location:../dokter_diagnosa.php");
    }
}
