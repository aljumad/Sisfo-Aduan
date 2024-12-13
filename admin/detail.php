<?php 
	include 'header.php';
	include '../config/haritgl.php';

	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_aduan='$id'");
	$data = mysqli_fetch_array($query);

	$nama = $data['nama'];
	$nik = $data['nik'];
	$nohp = $data['no_hp'];
	$email = $data['email'];
	$judul = $data['judul_aduan'];
	$kategori = $data['kategori'];
	$kecamatan = $data['kecamatan'];
	$kelurahan = $data['kelurahan'];
	$alamat = $data['alamat_kejadian'];
	$waktu = $data['waktu'];
	$isi = $data['isi'];
	$berkas = $data['berkas'];
	$status = $data['status'];

    $tgl = tgl_indo(date('Y-m-d', strtotime($data['tgl_aduan'])));

    $hari = date('D', strtotime($data['tgl_aduan']));

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
		$alert = 'alert-warning';
	}
	else if($status == 'Diproses') {
		$alert = 'alert-danger';
	}
	else if($status == 'Selesai') {
		$alert = 'alert-success';
	}
	else {
		$alert = 'alert-dark';
	}
  
 ?>

 	<h3 class="text-center">Detail Pengaduan</h3>
	<hr>
	
	<div class="rounded"><br>
		<div class="table-responsive-sm">
		  <table class="table">
		    <tr class="alert alert-info" role="alert">
		      <th scope="row">Kode Pengaduan</th>
		      <td><?php echo $id ?></td>
		    </tr>
		    <tr class="alert <?php echo $alert; ?>" role="alert">
		      <th scope="row">Status Pengaduan</th>
		      <td><?php echo $status ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Nama</th>
		      <td><?php echo $nama ?></td>
		    </tr>
		    <tr>
		      <th scope="row">NIK</th>
		      <td><?php echo $nik ?></td>
		    </tr>
		    <tr>
		      <th scope="row">No. Hp/WA</th>
		      <td><?php echo $nohp ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Email</th>
		      <td><?php echo $email ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Tanggal</th>
		      <td><?php echo $hari_ini.', '. $tgl ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Judul</th>
		      <td><?php echo $judul ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Kategori</th>
		      <td><?php echo $kategori ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Kelurahan</th>
		      <td><?php echo $kelurahan ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Kecamatan</th>
		      <td><?php echo $kecamatan ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Alamat / Lokasi</th>
		      <td><?php echo $alamat ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Waktu Kejadian</th>
		      <td><?php echo $waktu ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Isi</th>
		      <td><?php echo $isi ?></td>
		    </tr>
		    <tr>
		      <th scope="row">Berkas / Foto</th>
		      <td><a href="../img/<?php echo $berkas; ?>"><img src="../img/<?php echo $berkas; ?>" class="img-fluid rounded mx-auto d-block"></a></td>
		    </tr>
		  </table>
		</div>
	</div>
	<p class="text-center">
    <a href="data-pengaduan.php" class="btn btn-primary"><< KEMBALI</a>
  </p>
	<hr>

 <?php 
	include 'footer.php';
 ?>