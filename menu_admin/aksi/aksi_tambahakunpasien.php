<?php
include "../../koneksi.php";
$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_hp = $_POST['no_hp'];

$sql = "INSERT into pasien (username,password,nama_pasien,jenis_kelamin,alamat,no_hp) values ('$username','$password','$nama_pasien','$jenis_kelamin','$alamat','$no_hp')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil ditambah!'); 
    window.location.href = ('../admin_akunpasien.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('../admin_akunpasien.php');
    </script>";
}
