<?php
include "../../koneksi.php";
$nama_dokter = $_POST['nama_dokter'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$spesialis = $_POST['spesialis'];
$id_poliklinik = $_POST['id_poliklinik'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT into dokter (username,password,nama_dokter,jenis_kelamin,alamat,spesialis,id_poliklinik) values ('$username','$password','$nama_dokter','$jenis_kelamin','$alamat','$spesialis','$id_poliklinik')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil ditambah!'); 
    window.location.href = ('../admin_akundokter.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('../admin_akundokter.php');
    </script>";
}
