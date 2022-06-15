<?php
include "../../koneksi.php";
$username = $_POST['username_admin'];
$nama_admin = $_POST['nama_admin'];
$password = $_POST['password'];

$sql = "INSERT into admin (username,password,nama_admin) values ('$username','$password','$nama_admin')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('Data berhasil ditambah!'); 
    window.location.href = ('../admin_akunadmin.php');  
    </script>";
} else {
    echo "<script> 
    alert('Data gagal ditambah!');        
    window.location.href = ('../admin_akunadmin.php');
    </script>";
}
