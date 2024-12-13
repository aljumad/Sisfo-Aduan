<?php 
	include 'header.php';
 ?>
	<h3 class="text-center">Riwayat Pengaduan Online</h3>
	<hr>
	<h6>Pantau Pengaduan</h6>

	<div class="card">
	    <div class="card-body">
	        <p class="card-text">Temukan status terakhir pengaduan Anda dengan memasukkan Kode Pengaduan :</p>
	        <form class="form" method="post" action="cari.php">
	            <div class="form-group">
	                <div class="col-sm px-0">
	                    <input type="text" class="form-control" name="cari" maxlength="100" id="cari" placeholder="Kode Pengaduan" required="">
	                </div>
	            </div>
	            <div>
	                <button type="submit" class="btn btn-primary">Cari</button>
	            </div>
	        </form>
	    </div>
	</div>
	<hr>

	<h6>Pengaduan Masyarakat</h6>
<?php 
    include 'config/koneksi.php';
    include 'config/haritgl.php';

    $data = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_aduan desc");

    $bg = '';
    while ($d = mysqli_fetch_array($data)) {
    	$id = $d['id_aduan'];
    	$judul = $d['judul_aduan'];
    	$isi = $d['isi'];
    	$status = $d['status'];

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


	if($status == 'Menunggu Verifikasi') {
		$bg = 'bg-warning';
	}
	else if($status == 'Diproses') {
		$bg = 'bg-danger';
	}
	else if($status == 'Selesai') {
		$bg = 'bg-success';
	}
	else {
		$bg = 'bg-dark';
	}

        
?>
<div class="rounded border p-2 rwyt">
<div class="row">
	<div class="col-md-9">
			<a href="detail.php?id=<?php echo $id; ?>" style="color: #C10000;text-decoration: none;">
				<p><b><?php echo $judul; ?></b><br>
				<span class="text-dark"><?php echo $hari_ini.', '. $tgl; ?><br>
				<?php echo $isi; ?></span></p>
			
	</div>
	<div class="col-md-3">
			<p class="<?php echo $bg; ?> text-light text-center rounded m-1 p-1"><?php echo $status; ?></p>
			</a>
	</div>
</div>
</div>
	<hr>

 <?php 
}
	include 'footer.php';
 ?>