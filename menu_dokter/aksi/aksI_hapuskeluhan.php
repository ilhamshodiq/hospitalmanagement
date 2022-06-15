<?php
session_start();
include "../../koneksi.php";

if (isset($_POST['hapus'])) {
    $id_keluhan = $_POST['id_keluhan'];
    $query_l = "DELETE FROM keluhan WHERE id_keluhan='$id_keluhan'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('keluhan berhasil dihapus!');        
     </script>";
        header("Location:../dokter_keluhan.php");
    } else {
        echo "<script> 
        alert('keluhan gagal dihapus!');        
     </script>";
        header("Location:../dokter_keluhan");
    }
}
