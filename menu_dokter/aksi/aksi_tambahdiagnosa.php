<?php
include "../../koneksi.php";

$id_keluhan = $_POST['id_keluhan'];
$deskripsi_diagnosa = $_POST['deskripsi_diagnosa'];
$id_resep = $_POST['id_resep'];
if (isset($_POST['submitdiagnoasa'])) {
    $sqldiagnosa = "INSERT into diagnosa (id_keluhan,deskripsi_diagnosa,id_resep) VALUES ('$id_keluhan','$deskripsi','$id_resep')";
    $querydiagnosa = $koneksi->query($sqldiagnosa);
    if ($querydiagnosa == true) {
        echo "<script>                     
            window.location.href = ('dokter_diagnosa.php');  
            </script>";
    } else {
        echo "<script> 
                alert('Proses Diagnosa gagal!');        
                window.location.href = ('dokter_diagnosa.php');
                </script>";
    }
}
