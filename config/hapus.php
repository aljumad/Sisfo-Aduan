<?php

	include_once "koneksi.php";

	$id = $_GET['id'];

	mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_aduan='$id'");

	mysqli_query($koneksi, "DELETE FROM hasil WHERE id_aduan='$id'");

	mysqli_query($koneksi, "DELETE FROM lampiran_pengaduan WHERE id_aduan='$id'");

	mysqli_query($koneksi, "DELETE FROM lampiran_hasil WHERE id_hasil='$id'");

	echo"<script>document.location.href='../admin/data-pengaduan.php';</script>";

?>
