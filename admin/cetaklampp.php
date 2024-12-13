<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data</title>
</head>
<body>
	<div class="row mx-auto pl-2">
				<div class="table-responsive">
					<center>
 
		<h2>LAMPIRAN PENGADUAN</h2>
 
						<table class="table w-100 table-striped table-sm table-hover" border="1">
						
						<tbody style="text-align: center;">

				<?php
					include '../config/koneksi.php';
				    $ambil = $_GET['id'];


				    $data = mysqli_query($koneksi,"SELECT * FROM lampiran_hasil WHERE id_hasil='$ambil'");
				    
				    while ($d = mysqli_fetch_array($data)) {

				        $file = $d['nama_file'];
				        $ket = $d['ket'];

				?>
				           	<tr align="center">
					            <th><h3><?php echo $ket; ?></h3></th>
					        </tr>
					        <tr align="center">
					            <th><p style="text-align: center; padding: 5px"><img src="../img/<?php echo $file; ?>" width='100%'></p></th>
					            
					        </tr>
				<?php
				    }
				?>

				        </tbody>
					</table>
				</div></center>

			</div>
			<script>
		window.print();
	</script>
</body>
</html>
