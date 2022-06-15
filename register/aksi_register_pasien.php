<?php
include "../koneksi.php";
$username = $_POST['username'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
$ulangi_password = $_POST['ulangi_password'];

if ($password == $ulangi_password) {
    $sql = "INSERT INTO pasien (username, password, nama_pasien, jenis_kelamin, alamat, no_hp) VALUES ('$username', '$password', '$nama', '$jenis_kelamin', '$alamat', '$no_hp')";
    $a = $koneksi->query($sql);
    if ($a == true) {
        echo "
            <script>
                alert('Anda Sukses Registrasi');
                window.location='../login/login_pasien.php';
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
