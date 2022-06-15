<?php
include "../../koneksi.php";
$nama_poliklinik = $_POST['nama_poliklinik'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT into poliklinik (nama_poliklinik,deskripsi) values ('$nama_poliklinik','$deskripsi')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Poliklinik berhasil ditambah!'); 
    window.location.href = ('../admin_poliklinik.php');  
    </script>";
} else {
    echo "<script> 
    alert('Poliklinik gagal ditambah!');        
    window.location.href = ('../admin_poliklinik.php');
    </script>";
}
