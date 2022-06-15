<?php
session_start();
include "../../koneksi.php";

if (isset($_POST['hapus'])) {
    $id_diagnosa = $_POST['id_diagnosa'];
    $query_l = "DELETE FROM diagnosa WHERE id_diagnosa='$id_diagnosa'";
    if ($h_l = $koneksi->query($query_l)) {
        echo "<script> 
        alert('keluhan berhasil dihapus!');        
     </script>";
        header("Location:../pasien_keluhan.php");
    } else {
        echo "<script> 
        alert('keluhan gagal dihapus!');        
     </script>";
        header("Location:../pasien_keluhan");
    }
}
