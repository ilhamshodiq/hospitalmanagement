<?php
include "../../koneksi.php";
$nama_obat = $_POST['nama_obat'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$sql = "INSERT into obat (nama_obat,harga,stok) values ('$nama_obat','$harga','$stok')";
$query = $koneksi->query($sql);
if ($query == true) {
    echo "<script> 
    alert('obat berhasil ditambah!'); 
    window.location.href = ('../admin_obat.php');  
    </script>";
} else {
    echo "<script> 
    alert('obat gagal ditambah!');        
    window.location.href = ('../admin_obat.php');
    </script>";
}
