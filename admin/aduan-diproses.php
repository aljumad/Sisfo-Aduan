<?php 
    include 'header.php';
    include '../config/koneksi.php';
    include '../config/haritgl.php';
?>

	<h3 class="text-center">DAFTAR PENGADUAN HUKUM YANG DIPROSES</h3>
	<hr>

	<h6 class="text-center">Pengaduan Diproses Per Periode</h6>

	<div class="card">
	    <div class="card-body shadow">

	    	<?php 
	    		$darii = '';
	    		$sampaii = '';
	    		if(isset($_POST['filter'])) {
	    			if (($_POST['dari'] != '') and ($_POST['sampai'] != '')) {
	    				$darii = $_POST['dari'];
						$sampaii = $_POST['sampai'];
	    			}
	    		}
	    	 ?>
	       
	        <form class="container form w-50 mx-auto justify-content-center" method="post" action="">

	            <div class="form-group row ">
			        <label for="dari" class="col-sm-5 col-form-label">Dari Tanggal</label>
			        <div class="col-sm-5">
			          <input type="date" class="form-control" value="<?php echo $darii; ?>" name="dari" id="dari">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="sampai" class="col-sm-5 col-form-label">Sampai Tanggal</label>
			        <div class="col-sm-5">
			          <input type="date" class="form-control" value="<?php echo $sampaii; ?>" name="sampai" id="sampai">
			        </div>
			      </div>
			      <div class="form-group row">
			        <div for="sampai" class="col-sm-5 ">
			        	<button type="submit" name="filter" class="btn btn-info w-100">Filter</button>
			        </div>
			        <div class="col-sm-5">
			          
			          <button type="submit" name="semua" class="btn btn-warning w-100">Tampilkan Semua</button>
			        </div>
			      </div>
	        </form>
	    </div>
	</div>
	<hr>

	<div class="row mx-auto w-auto justify-content-center bg-light">
	<div class="row w-100 mx-auto justify-content-center bg-white shadow p-3">
	<form class="bg-white rounded ">
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-responsive table-sm table-hover">
		<thead style="background: #C10000;color: white;">
		   	<tr class="text-center">
		      	<th scope="col">NO</th>
		      	<th scope="col">TANGGAL</th>
		      	<th scope="col">PELAPOR</th>
		      	<th scope="col">JUDUL</th>
		      	<th scope="col">KATEGORI</th>
		      	<th scope="col" colspan="4">AKSI</th>
		    </tr>
		</thead>
		<tbody>

<?php 
    include_once '../config/koneksi.php';
    $no = 1;

    if(!isset($_POST['filter']) or isset($_POST['semua'])) {

    	$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses' ORDER BY id_aduan DESC");
	}	
	else {
		if (($_POST['dari'] == '') and ($_POST['sampai']  == '')) {
			$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses' ORDER BY id_aduan DESC");
		}
		else {
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
		$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses' and tgl_aduan between 
			'$dari' and '$sampai' ORDER BY id_aduan ASC");
		}
	}
    while ($d = mysqli_fetch_array($data)) {
        $id = $d['id_aduan'];
        $tgl = tgl_indo(date('Y-m-d', strtotime($d['tgl_aduan'])));
        $nama = $d['nama'];
        $judul = $d['judul_aduan'];
        $kat = $d['kategori'];
        $alm = $d['alamat_kejadian'];
        $status = $d['status'];
        $nama = $d['nama'];
        $hp = $d['no_hp'];
        $hpp = substr($hp, 1);
		$selesai = 'Halo '.$nama.'. Pengaduan anda ('.$judul.') dengan kode : '.$id.' telah selesai ditindaklanjuti. Terimakasih.%0A~Polres Kendari';

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
	


?>
           	<tr class="text-center">
	            <td><?php echo $no++; ?></td>
	            <td><?php echo $hari_ini.', '.$tgl; ?></td>
	            <td><?php echo $nama; ?></td>
	            <td><?php echo $judul; ?></td>
	            <td><?php echo $kat; ?></td>
	            <td>
	            	<a href="detail.php?id=<?php echo $id ?>" class="btn btn-success">DETAIL</a>
	            </td>
	            <td>
	            	<a onclick="window.open('https://api.whatsapp.com/send?phone=62<?php echo $hpp ?>&text=<?php echo $selesai ?>')" href="../config/selesai.php?id=<?php echo $id ?>" class="btn btn-primary" readonly>SELESAIKAN</a>
	            </td>
	            <td>
	            	<a href="../config/hapus.php?id=<?php echo $id ?>" class="btn btn-danger" name="hapus" id="hapus" onclick="alert('Yakin Hapus??')">HAPUS</a>
	            </td>
	            <td>
	            	<a href="cetaklamp.php?id=<?php echo $id ?>" target="_blank" class="btn btn-info">LAMPIRAN</a>
	            </td>
	        </tr>
<?php
    }
?>

        </tbody>
	</table><hr>
	<div class="row text-center w-auto mx-auto justify-content-center">
		<?php 
			if (isset($_POST['filter'])) {
				$tgl1 = $_POST['dari'];
				$tgl2 = $_POST['sampai'];
				echo '<a href="cetak.php?dari='.$tgl1.'&sampai='.$tgl2.'" target="_blank" class="btn btn-danger">CETAK</a>';
			}
			else {
				echo '<a href="cetak.php" target="_blank" class="btn btn-danger">CETAK</a>';
			}
		 ?>

		<!-- <a href="cetak.php" target="_blank" class="btn btn-danger">CETAK</a> -->

	</div>
</form>
</div></div>
</div><hr>
 <?php 
	include 'footer.php';
 ?>