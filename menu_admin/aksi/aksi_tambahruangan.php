<?php
include "../../koneksi.php";
$nama_ruangan = $_POST['nama_ruangan'];

$sql = "INSERT into ruangan (nama_ruangan) values ('$nama_ruangan')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('ruangan berhasil ditambah!'); 
    window.location.href = ('../admin_ruangan.php');  
    </script>";
} else {
    echo "<script> 
    alert('ruangan gagal ditambah!');        
    window.location.href = ('../admin_ruangan.php');
    </script>";
}
