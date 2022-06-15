<?php
include "../koneksi.php";
$username = $_POST['username'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$spesialis = $_POST['spesialis'];
$id_poliklinik = $_POST['id_poliklinik'];
$password = $_POST['password'];
$ulangi_password = $_POST['ulangi_password'];

if ($password == $ulangi_password) {
    $sql = "INSERT INTO dokter (username, password, nama_dokter, jenis_kelamin, alamat, spesialis, id_poliklinik) VALUES ('$username', '$password', '$nama', '$jenis_kelamin', '$alamat', '$spesialis', '$id_poliklinik')";
    $a = $koneksi->query($sql);
    if ($a == true) {
        echo "
            <script>
                alert('Anda Sukses Registrasi');
                window.location='../login/login_dokter.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error');
                history.back();
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Ulangi, Password Anda tidak sama');
            history.back();
        </script>
    ";
}
