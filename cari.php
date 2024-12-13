<?php 
	include 'header.php';
	include 'config/koneksi.php';
	include 'config/haritgl.php';

	$id = $_POST['cari'];

	$data = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_aduan='$id' ");

	$cari = mysqli_num_rows($data);
    $d = mysqli_fetch_array($data);

    $judul = $d['judul_aduan'];
    $isi = $d['isi'];

    date_default_timezone_set("Asia/Makassar");
    $tgl = tgl_indo(date('Y-m-d', strtotime($d['tgl_aduan'])));

    $hari = date('D', strtotime($d['tgl_aduan']));

		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}

	if($cari){

 ?>
	<h3 class="text-center">Hasil Pencarian</h3>
	<hr>
	<div class="rounded border p-2">
		<p><b><a href="detail.php?id=<?php echo $id; ?>" style="color: #C10000;text-decoration: none;"><?php echo $judul; ?></a></b><br>
		<?php echo $hari_ini.', '. $tgl; ?><br>
		<?php echo $isi; ?></p>
	</div>

<?php 
	}
	else {
	    echo '<h3 class="text-center">Data Tidak Ditemukan!</h3>
	<hr>';
	}
	include 'footer.php';
 ?>