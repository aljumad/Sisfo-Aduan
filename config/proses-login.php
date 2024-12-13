<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' && password='$password'");

$cari = mysqli_num_rows($sql);
$akses=mysqli_fetch_array($sql);

if($cari){
	session_start();
	$_SESSION['user'] = $akses['id_admin'];
    echo"<script>alert('Login Berhasil!');document.location.href='../admin';</script>";
}else{
	echo"<script>alert('Login Gagal!');document.location.href='../admin/login.php';</script>";
}
?>