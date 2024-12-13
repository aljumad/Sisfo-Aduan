<?php 
  include 'header.php';

  include_once '../config/koneksi.php';

  $data1 = mysqli_query($koneksi,"SELECT * FROM pengaduan");
  $data2 = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Diproses'");
  $data3 = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Ditolak'");
  $data4 = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Selesai'");
  $data7 = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='Menunggu Verifikasi'");
  
  $data6 = mysqli_query($koneksi,"SELECT * FROM admin");

  $d1 = mysqli_num_rows($data1);
  $d2 = mysqli_num_rows($data2);
  $d3 = mysqli_num_rows($data3);
  $d4 = mysqli_num_rows($data4);
  $d6 = mysqli_num_rows($data6);
  $d7 = mysqli_num_rows($data7);

  $result = mysqli_query($koneksi, "SELECT count(distinct nik) from pengaduan");
  $row = mysqli_fetch_row($result);
  $d5 = $row[0];

?>

    <h3 class="text-center">Selamat Datang Admin!</h3>
    <hr>
    <p class="text-center">

    <div class="card-deck mx-auto">
    	<div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-primary">
    			<div class="bg-primary">
    				<p class="text-center">
		      			<img src="../img/icon/baseline2.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-primary ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d1 ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Pengaduan</h6><br>
			  </div>
			</div>
	  </div>

	  <div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-warning">
    			<div class="bg-warning">
    				<p class="text-center">
		      			<img src="../img/icon/baseline_supervisor_account_white_48dp.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-warning ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d7 ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Menunggu Verifikasi</h6>
			  </div>
			</div>
	  </div>

	  <div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-secondary">
    			<div class="bg-secondary">
    				<p class="text-center">
		      			<img src="../img/icon/baseline_autorenew_white_48dp.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-secondary ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d2 ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Diproses</h6><br>
			  </div>
			</div>
	  </div>

	  <div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-success">
    			<div class="bg-success">
    				<p class="text-center">
		      			<img src="../img/icon/baseline_landscape_white_48dp.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-success ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d4 ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Selesai</h6>
			  </div>
			</div>
	  </div>

	  <div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-danger">
    			<div class="bg-danger">
    				<p class="text-center">
		      			<img src="../img/icon/baseline_delete_forever_white_48dp.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-danger ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d3; ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Ditolak</h6>
			  </div>
			</div>
	  </div>

	  <div class="row no-gutters mb-4 mx-auto"  style="width: 250px">
    		<div class="col-sm-4 bg-info">
    			<div class="bg-info">
    				<p class="text-center">
		      			<img src="../img/icon/baseline_account_circle_white_48dp.png" class="img-fluid p-2 rounded d-block mx-auto mt-5" alt="...">
		      		</p>
		      	</div>
		    </div>
		    <div class="col-sm-8">
			  <div class="card  border-light bg-info ml-0 text-light text-center">
			    <div class="card-body border-light"><br>
			      <h1 class="card-title"><?php echo $d6; ?></h1>
			    </div>
			    <h6 class="card-footer border-light bg-transparent">Admin </h6>
			  </div>
			</div>
	  </div>
	</div>

	</p>
	<hr>

	<?php 
		$query1 = mysqli_query($koneksi, "SELECT * FROM pengaduan");
		$q1 = mysqli_fetch_array($query1);
		$tot = mysqli_num_rows($query1);
		$tgl = $q1['tgl_aduan'];

		$thn = substr($tgl, 0, 4);
	?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Grafik Pengaduan Per Bulan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Grafik Pengaduan Per Kategori</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  		<div class="container">
			<div class="row">
				<div class="col">
					<br>
					<h5 class="text-center">Tahun <?php echo $thn ?></h5>
					<p class="text-center">Total Kasus : <?php echo $tot ?></p>
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	  	<div class="container">
			<div class="row">
				<div class="col">
					<br>
					<h5 class="text-center">Tahun <?php echo $thn ?></h5>
					<p class="text-center">Total Kasus : <?php echo $tot ?></p>
					<canvas id="myChart2"></canvas>
				</div>
			</div>
		</div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var ctx2 = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Kasus',
					data: [
					<?php 
					$jan = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '01'");
					echo mysqli_num_rows($jan);
					?>, 
					<?php 
					$feb = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '02'");
					echo mysqli_num_rows($feb);
					?>, 
					<?php 
					$mar = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '03'");
					echo mysqli_num_rows($mar);
					?>, 
					<?php 
					$apr = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '04'");
					echo mysqli_num_rows($apr);
					?>,
					<?php 
					$mei = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '05'");
					echo mysqli_num_rows($mei);
					?>, 
					<?php 
					$jun = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '06'");
					echo mysqli_num_rows($jun);
					?>, 
					<?php 
					$jul = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '07'");
					echo mysqli_num_rows($jul);
					?>, 
					<?php 
					$agu = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '08'");
					echo mysqli_num_rows($agu);
					?>,
					<?php 
					$sep = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '09'");
					echo mysqli_num_rows($sep);
					?>, 
					<?php 
					$okt = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '10'");
					echo mysqli_num_rows($okt);
					?>, 
					<?php 
					$nov = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '11'");
					echo mysqli_num_rows($nov);
					?>, 
					<?php 
					$des = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE MONTH(tgl_aduan) = '12'");
					echo mysqli_num_rows($des);
					?>
					],
					backgroundColor: [
	                    'rgba(255, 0, 0, 0.2)',
	                    'rgba(0, 255, 0, 0.2)',
	                    'rgba(0, 0, 255, 0.2)',
	                    'rgba(255, 255, 0, 0.2)',
	                    'rgba(255, 0, 255, 0.2)',
	                    'rgba(0, 255, 255, 0.2)',
	                    'rgba(0, 255, 122, 0.2)',
	                    'rgba(122, 122, 0, 0.2)',
	                    'rgba(122, 0, 122, 0.2)',
	                    'rgba(0, 122, 122, 0.2)',
	                    'rgba(64, 255, 255, 0.2)',
	                    'rgba(255, 64, 64, 0.2)'
	                ],
	                borderColor: [
	                    'rgba(255, 0, 0, 1)',
	                    'rgba(0, 255, 0, 1)',
	                    'rgba(0, 0, 255, 1)',
	                    'rgba(255, 255, 0, 1)',
	                    'rgba(255, 0, 255, 1)',
	                    'rgba(0, 255, 255, 1)',
	                    'rgba(0, 255, 122, 1)',
	                    'rgba(122, 122, 0, 1)',
	                    'rgba(122, 0, 122, 1)',
	                    'rgba(0, 122, 122, 1)',
	                    'rgba(64, 255, 255, 1)',
	                    'rgba(255, 64, 64, 1)'
	                ],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

		var myChart2 = new Chart(ctx2, {
			type: 'bar',
			data: {
				labels: ["Asusila", "Begal", "Cyber Crime", "KDRT", "Narkoba", "Pembunuhan", "Pencurian", "Penganiayaan", "Penipuan", "Tabrak Lari", "Lainnya"],
				datasets: [{
					label: 'Kasus',
					data: [
					<?php 
					$jan = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Asusila'");
					echo mysqli_num_rows($jan);
					?>, 
					<?php 
					$feb = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Begal'");
					echo mysqli_num_rows($feb);
					?>, 
					<?php 
					$mar = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Cyber Crime'");
					echo mysqli_num_rows($mar);
					?>, 
					<?php 
					$apr = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'KDRT'");
					echo mysqli_num_rows($apr);
					?>,
					<?php 
					$mei = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Narkoba'");
					echo mysqli_num_rows($mei);
					?>, 
					<?php 
					$jun = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Pembunuhan'");
					echo mysqli_num_rows($jun);
					?>, 
					<?php 
					$jul = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Pencurian'");
					echo mysqli_num_rows($jul);
					?>, 
					<?php 
					$agu = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Penganiayaan'");
					echo mysqli_num_rows($agu);
					?>,
					<?php 
					$sep = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Penipuan'");
					echo mysqli_num_rows($sep);
					?>, 
					<?php 
					$okt = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Tabrak Lari'");
					echo mysqli_num_rows($okt);
					?>, 
					<?php 
					$nov = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE kategori = 'Lainnya'");
					echo mysqli_num_rows($nov);
					?>
					],
					backgroundColor: [
	                    'rgba(255, 0, 0, 0.2)',
	                    'rgba(0, 255, 0, 0.2)',
	                    'rgba(0, 0, 255, 0.2)',
	                    'rgba(255, 255, 0, 0.2)',
	                    'rgba(255, 0, 255, 0.2)',
	                    'rgba(0, 255, 255, 0.2)',
	                    'rgba(0, 255, 122, 0.2)',
	                    'rgba(122, 122, 0, 0.2)',
	                    'rgba(122, 0, 122, 0.2)',
	                    'rgba(0, 122, 122, 0.2)',
	                    'rgba(64, 255, 255, 0.2)',
	                    'rgba(255, 64, 64, 0.2)'
	                ],
	                borderColor: [
	                    'rgba(255, 0, 0, 1)',
	                    'rgba(0, 255, 0, 1)',
	                    'rgba(0, 0, 255, 1)',
	                    'rgba(255, 255, 0, 1)',
	                    'rgba(255, 0, 255, 1)',
	                    'rgba(0, 255, 255, 1)',
	                    'rgba(0, 255, 122, 1)',
	                    'rgba(122, 122, 0, 1)',
	                    'rgba(122, 0, 122, 1)',
	                    'rgba(0, 122, 122, 1)',
	                    'rgba(64, 255, 255, 1)',
	                    'rgba(255, 64, 64, 1)'
	                ],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<?php 
  include 'footer.php';
?>