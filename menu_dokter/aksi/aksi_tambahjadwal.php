<?php
include "../../koneksi.php";
$id_dokter = $_POST['id_dokter'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_berakhir = $_POST['waktu_berakhir'];

$sql = "INSERT into jadwal_dokter (id_dokter,waktu_mulai,waktu_berakhir) values ('$id_dokter','$waktu_mulai','$waktu_berakhir')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('jadwal berhasil ditambah!'); 
    window.location.href = ('../dokter_jadwal.php');  
    </script>";
} else {
    echo "<script> 
    alert('jadwal gagal ditambah!');        
    window.location.href = ('../dokter_jadwal.php');
    </script>";
}
