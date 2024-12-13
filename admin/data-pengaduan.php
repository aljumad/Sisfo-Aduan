<?php 
    include 'header.php';
    include '../config/koneksi.php';
    include '../config/haritgl.php';
?>

	<h3 class="text-center">DAFTAR PENGADUAN HUKUM TINDAK PIDANA</h3>
	<hr>
	<h6 class="text-center">Pengaduan Per Periode</h6>

	<div class="card">
	    <div class="card-body shadow">
	       
	        <form class="container form w-50 mx-auto justify-content-center" method="post" action="">

	            <div class="form-group row ">
			        <label for="dari" class="col-sm-5 col-form-label">Dari Tanggal</label>
			        <div class="col-sm-5">
			          <input type="date" class="form-control" name="dari" id="dari">
			        </div>
			      </div>
			      <div class="form-group row">
			        <label for="sampai" class="col-sm-5 col-form-label">Sampai Tanggal</label>
			        <div class="col-sm-5">
			          <input type="date" class="form-control" name="sampai" id="sampai">
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

	<div class="row mx-auto w-auto justify-content-center bg-light ">
	<div class="table-responsive">
	<form class="bg-white rounded shadow m-2 p-3">
	
	<table class="table table-striped table-bordered table-responsive table-sm table-hover">
		<thead style="background: #C10000;color: white;">
		   	<tr class="text-center">
		      	<th scope="col">NO</th>
		      	<th scope="col">TANGGAL</th>
		      	<th scope="col">JUDUL</th>
		      	<th scope="col">STATUS</th>
		      	<th scope="col" colspan="4">AKSI</th>
		    </tr>
		</thead>
		<tbody>

<?php 
    include_once '../config/koneksi.php';
    $no = 1;

    if(!isset($_POST['filter']) or isset($_POST['semua'])) {

    	$data = mysqli_query($koneksi,"SELECT * FROM pengaduan ORDER BY id_aduan DESC");
	}	
	else {
		$dari = $_POST['dari'];
		$sampai = $_POST['sampai'];
		$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE tgl_aduan between 
			'$dari' and '$sampai' ORDER BY id_aduan ASC");
	}

    while ($d = mysqli_fetch_array($data)) {
        $id = $d['id_aduan'];
        $tgl = tgl_indo(date('Y-m-d', strtotime($d['tgl_aduan'])));
        $judul = $d['judul_aduan'];
        $hp = $d['no_hp'];
        $status = $d['status'];
        $nama = $d['nama'];
        $proses = '';
        $tolak = '';
        if ($status == 'Diproses') {
        	$proses = 'disabled';
        }

        if ($status == 'Ditolak') {
        	$tolak = 'disabled';
        }

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

	$hpp = substr($hp, 1);
	$diproses = 'Halo '.$nama.'. Pengaduan anda ('.$judul.') dengan kode : '.$id.' telah diverifikasi dan sedang dalam proses untuk ditindaklanjuti%0A~Polres Kendari';
	$ditolak = 'Halo '.$nama.'. Pengaduan anda ('.$judul.') dengan kode : '.$id.' telah ditolak. Isi data pengaduan dengan benar dan lampirkan berkas yang sesuai%0A~Polres Kendari';

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
           	<tr class="text-center">
	            <td><?php echo $no++; ?></td>
	            <td><?php echo $hari_ini.', '.$tgl; ?></td>
	            <td><?php echo $judul; ?></td>
	            <td><p class="<?php echo $bg; ?> text-light text-center rounded m-1 p-1"><?php echo $status; ?></p></td>
	            <td>
	            	<a href="detail.php?id=<?php echo $id ?>" class="btn btn-success">DETAIL</a>
	            </td>
	            <td>
	            	<a onclick="window.open('https://api.whatsapp.com/send?phone=62<?php echo $hpp ?>&text=<?php echo $diproses ?>')" href="../config/proses.php?id=<?php echo $id ?>" class="btn btn-primary <?php echo $proses; ?>">PROSES</a>
	            </td>
	            <td>
	            	<a onclick="window.open('https://api.whatsapp.com/send?phone=62<?php echo $hpp ?>&text=<?php echo $ditolak ?>')" href="../config/tolak.php?id=<?php echo $id ?>" class="btn btn-warning <?php echo $tolak ?>">TOLAK</a>
	            </td>
	            <td>
	            	<a href="../config/hapus.php?id=<?php echo $id ?>" class="btn btn-danger" name="hapus" id="hapus" onclick="alert('Yakin Hapus??')">HAPUS</a>
	            </td>
	        </tr>
<?php
    }
?>

        </tbody>
	</table>

</form>
</div>
	</div><hr>
 <?php 
	include 'footer.php';
 ?>