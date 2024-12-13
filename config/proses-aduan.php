<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	include "koneksi.php";
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	require '../PHPMailer/src/Exception.php';

	date_default_timezone_set("Asia/Makassar");

	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$noHp = $_POST['noHp'];
	$email = $_POST['email'];
	$tgl = date('Y-m-d H:i:s');
	$judul = $_POST['judul'];
	$kategori = $_POST['kategori'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$alamatKejadian = $_POST['alamatKejadian'];
	$waktuKejadian = $_POST['waktuKejadian'];
	$isi = $_POST['isi'];
	$berkas = $_FILES['berkas']['name'];
	$status = 'Menunggu Verifikasi';

        $hpp = substr($noHp, 1);
		

	mysqli_query($koneksi, "INSERT INTO pengaduan VALUES ('', '', '$nama', '$nik', '$noHp', '$email', '$tgl', '$judul', '$kategori', '$kecamatan', '$kelurahan', '$alamatKejadian', '$waktuKejadian', '$isi', '$berkas', '$status' )");
	$idbaru = mysqli_insert_id($koneksi);
	mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$idbaru', '$nik')");
	move_uploaded_file($_FILES['berkas']['tmp_name'],"../img/".$berkas);

	
	// $verif = 'Pengaduan anda ('.$judul.') dengan kode'.$idbaru.' sedang menunggu verifikasi%0A~Polres Kendari';

	$mail = new PHPMailer(true);
	$mail->IsSMTP(); 
	$mail->IsHTML(); 
	$mail->SMTPAuth  = true; 
	$mail->Host      = 'yana.aaiii.cyou';
	$mail->Port      = 465;
	$mail->SMTPSecure= 'ssl';
	$mail->Username  = 'mail@yana.aaiii.cyou';
	$mail->Password  = '1qwaszx2321';
	$mail->From      = 'mail@yana.aaiii.cyou';
	$mail->FromName  = 'Polres Kendari';
	$mail->AddAddress($email, $nama);
	$mail->Subject   = 'Pengaduan '.$judul;
	$mail->Body      = 'Halo '.$nama.'. Pengaduan anda ('.$judul.') dengan kode : '.$idbaru.' sedang menunggu verifikasi. ~Polres Kendari';

	$mail->Send();
	
 echo"<script>alert('Pengaduan Terkirim! Kode Aduan:".$idbaru.". dan Status Pengaduan anda telah kami kirimkan lewat Email ');document.location.href='../riwayat.php';</script>";
  ?>
