<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	include "koneksi.php";
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	require '../PHPMailer/src/Exception.php';

	session_start();

	$admin = $_SESSION['user'];
	$ambil = $_GET['id'];

	$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_aduan='$ambil'");
	    while ($d = mysqli_fetch_array($data)) {
		$idaduan = $d['id_aduan'];
		$file = $d['berkas'];
		$ket = $d['judul_aduan'];
		$isi = $d['isi'];
		$nama = $d['nama'];
		$to = $d['email'];
		
	$mail = new PHPMailer(true);
	$mail->IsSMTP(); 
	$mail->IsHTML(); 
	$mail->SMTPAuth  = true; 
	$mail->Host      = 'aduan.array.my.id';
	$mail->Port      = 465;
	$mail->SMTPSecure= 'ssl';
	$mail->Username  = 'mail@aduan.array.my.id';
	$mail->Password  = '1qwaszx2321';
	$mail->From      = 'mail@aduan.array.my.id';
	$mail->FromName  = 'Polres Kendari';
	$mail->AddAddress($to, $nama);
	$mail->Subject   = 'Pengaduan '.$ket;
	$mail->Body      = 'Halo '.$nama.'. Pengaduan anda ('.$ket.') dengan kode : '.$idaduan.' telah selesai ditindaklanjuti. Terimakasih. ~Polres Kendari';

	$mail->Send();

		$sqlupdate = mysqli_query($koneksi,"UPDATE pengaduan SET id_admin='$admin', status='Selesai' WHERE id_aduan='$idaduan'");
		mysqli_query($koneksi, "INSERT INTO hasil VALUES ('', '$admin', '$idaduan', '$isi' )");

		mysqli_query($koneksi,"INSERT INTO lampiran_hasil VALUES ('', '$idaduan', '$file', '$ket')");
		echo"<script>alert('Pengaduan Selesai!');document.location.href='../admin/hasil-aduan.php';</script>";
	}
	

?>