<?php 
    include 'koneksi.php';
	$lama = md5($_POST['plama']);
	$baru = md5($_POST['pbaru']);
	$konfirmasi = md5($_POST['konfirmasi']);
	$caripassword = mysqli_query($koneksi, "SELECT * FROM admin WHERE password='$lama'");
	$d = mysqli_fetch_array($caripassword);
	$idadmin = $d['id_admin'];

	$cekpassword = mysqli_num_rows($caripassword);
	if($cekpassword == 0){
		echo"<script>alert('Password Lama Salah');document.location.href='../admin/ubah-pass.php';</script>";
	}else if($baru != $konfirmasi){
		echo"<script>alert('Password Baru Tidak Sama');document.location.href='../admin/ubah-pass.php';</script>";
	}else{
		mysqli_query($koneksi, "UPDATE admin SET password='$baru' WHERE id_admin='$idadmin'");
		echo"<script>alert('Password Berhasil Di Perbaharui || Login Kembali');document.location.href='../admin/login.php';</script>";
		session_start();
		$_SESSION['user'] = '';
		unset($_SESSION['user']);

		session_destroy();	
	}
 ?>