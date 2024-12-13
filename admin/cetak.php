<!DOCTYPE html>

<html>

<head>

	<title>Cetak Data</title>

</head>

<body>

	<div class="row mx-auto pl-2">

				<div class="table-responsive">

					<center>

 

		<h2>DATA PENGADUAN HUKUM YANG DIPROSES</h2>

		<br>

 

	</center>

					<table class="table w-100 table-striped table-sm table-hover" border="1">

						<thead>

						   	<tr>

						      	<th scope="col" class="text-center">NO</th>

						      	<th scope="col" class="text-center">NAMA</th>

						      	<th scope="col" class="text-center">NIK</th>

						      	<th scope="col" class="text-center">NO HP</th>

						      	<th scope="col" class="text-center">EMAIL</th>

						      	<th scope="col" class="text-center">TGL ADUAN</th>

						      	<th scope="col" class="text-center">JUDUL</th>

						      	<th scope="col" class="text-center">KATEGORI</th>

						      	<th scope="col" class="text-center">KECAMATAN</th>

						      	<th scope="col" class="text-center">KELURAHAN</th>

						      	<th scope="col" class="text-center">ALAMAT</th>

						      	<th scope="col" class="text-center">WAKTU</th>

						      	<th scope="col" class="text-center">ISI</th>

						    </tr>

						</thead>

						<tbody style="text-align: center;">



				<?php

					include '../config/koneksi.php';

				    $no = 1;



				    if(isset($_GET['dari'])) {

				    	$tgl1 = $_GET['dari'];

				    	$tgl2 = $_GET['sampai'];

				    	$data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses' and tgl_aduan between 

			'$tgl1' and '$tgl2' ORDER BY id_aduan ASC");

				    }

				    else {



				    $data = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses' ORDER BY id_aduan ASC");

				    }

				    while ($d = mysqli_fetch_array($data)) {



				        $nama = $d['nama'];

				        $nik = $d['nik'];

				        $nohp = $d['no_hp'];

				        $email = $d['email'];

				        $tgl = $d['tgl_aduan'];

				        $judul = $d['judul_aduan'];

				        $kat = $d['kategori'];

				        $kec = $d['kecamatan'];

				        $kel = $d['kelurahan'];

				        $alamat = $d['alamat_kejadian'];

				        $waktu = $d['waktu'];

				        $isi = $d['isi'];



				?>

				           	<tr>

					            <td class="text-center"><?php echo $no++; ?></td>

					            <td><?php echo $nama; ?></td>

					            <td><?php echo $nik; ?></td>

					            <td><?php echo $nohp; ?></td>

					            <td><?php echo $email; ?></td>

					            <td><?php echo $tgl; ?></td>

					            <td><?php echo $judul; ?></td>

					            <td><?php echo $kat; ?></td>

					            <td><?php echo $kec; ?></td>

					            <td><?php echo $kel; ?></td>

					            <td><?php echo $alamat; ?></td>

					            <td><?php echo $waktu; ?></td>

					            <td><?php echo $isi; ?></td>

					            

					        </tr>

				<?php

				    }

				?>



				        </tbody>

					</table>

				</div>

			</div>

			<script>

		window.print();

	</script>

</body>

</html>
