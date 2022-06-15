<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $query_l = "SELECT * FROM admin where username = '$username' AND password = '$password';";
    $h_l = $koneksi->query($query_l);
    if (mysqli_num_rows($h_l) == 1) {
        $d_l = $h_l->fetch_array();
        $_SESSION['username'] = $d_l['username'];
        $_SESSION['nama'] = $d_l['nama_admin'];
        header("location:../menu_admin/admin_dashboard.php");
    } else {
        echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='login_admin.php';
		</script>";
    }
} else if ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['nama']);
    header("location:login_admin.php");
}
