<?php
include "../../koneksi.php";
$id_pasien = $_POST['id_pasien'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$id_dokter = $_POST['id_dokter'];
$deskripsi = $_POST['deskripsi'];
$id_ruangan = $_POST['id_ruangan'];

$sql = "INSERT into keluhan (id_pasien,tanggal,jam,id_dokter,deskripsi,id_ruangan) values ('$id_pasien','$tanggal','$jam','$id_dokter','$deskripsi','$id_ruangan')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Keluhan berhasil dibuat!!'); 
    window.location.href = ('../pasien_keluhan.php');  
    </script>";
} else {
    echo "<script> 
    alert('Keluhan gagal ditambah!');        
  
    </script>";
}
