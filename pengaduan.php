<?php 
	include 'header.php';
 ?>

 	<h3 class="text-center">Aplikasi Pengaduan Online</h3>
	<hr>
  <p class="text-center">
    <a href="informasi.php" class="btn btn-info">Lihat Cara Pengisian Form Pengaduan</a>
  </p>
 	<p class="text-danger">Masukkan data diri dan aduan Anda dengan benar!</p>

 	<form class="user" method="post" enctype="multipart/form-data" action="config/proses-aduan.php">
      <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Nama Pengadu</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="nama" required="" id="nama">
        </div>
      </div>
      <div class="form-group row">
        <label for="nik" class="col-sm-4 col-form-label">NIK KTP</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="nik" required="" id="nik">
        </div>
      </div>
      <div class="form-group row">
        <label for="noHp" class="col-sm-4 col-form-label">No. HP / WA</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="noHp" required="" id="noHp">
        </div>
      </div>
      <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm">
          <input type="email" class="form-control" name="email" required="" id="email">
        </div>
      </div>
      <div class="form-group row">
        <label for="judul" class="col-sm-4 col-form-label">Judul</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="judul" required="" id="judul">
        </div>
      </div>
      <div class="form-group row">
        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
        <div class="col-sm">
          <select class="form-control" name="kategori" required="" id="kategori">
  		      <option>--Pilih Kategori--</option>
  		      <option value="Asusila">Asusila</option>
  		      <option value="Begal">Begal</option>
  		      <option value="Cyber Crime">Cyber Crime</option>
            <option value="KDRT">KDRT</option>
            <option value="Narkoba">Narkoba</option>
            <option value="Pembunuhan">Pembunuhan</option>
            <option value="Pencurian">Pencurian</option>
            <option value="Penganiayaan">Penganiayaan</option>
            <option value="Penipuan">Penipuan</option>
            <option value="Tabrak Lari">Tabrak Lari</option>
            <option value="Lainnya">Lainnya</option>
		      </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
        <div class="col-sm">
          <select class="form-control" name="kecamatan" required="" id="kecamatan">
		      <option>--Pilih Kecamatan--</option>
		      <option value="Abeli">Abeli</option>
		      <option value="Baruga">Baruga</option>
		      <option value="Kadia">Kadia</option>
		      <option value="Kambu">Kambu</option>
		      <option value="Kendari">Kendari</option>
		      <option value="Kendari Barat">Kendari Barat</option>
		      <option value="Mandonga">Mandonga</option>
		      <option value="Nambo">Nambo</option>
		      <option value="Poasia">Poasia</option>
		      <option value="Puuwatu">Puuwatu</option>
		      <option value="Wua-wua">Wua-wua</option>
		  </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="kelurahan" class="col-sm-4 col-form-label">Kelurahan</label>
        <div class="col-sm">
          <input type="text" class="form-control" name="kelurahan" required="" id="kelurahan">
        </div>
      </div>
      <div class="form-group row">
        <label for="alamatKejadian" class="col-sm-4 col-form-label">Alamat / Lokasi Kejadian</label>
        <div class="col-sm">
          <textarea class="form-control" name="alamatKejadian" required="" id="alamatKejadian" rows="3"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="waktuKejadian" class="col-sm-4 col-form-label">Waktu Kejadian</label>
        <div class="col-sm">
          <input type="date" class="form-control" name="waktuKejadian" required="" id="waktuKejadian" value="<?php echo date('Y-m-d') ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="isi" class="col-sm-4 col-form-label">Isi</label>
        <div class="col-sm">
          <textarea class="form-control" name="isi" required="" id="isi" rows="3"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="berkas" class="col-sm-4 col-form-label">Berkas / Foto Bukti Kejadian</label>
        <div class="col-sm">
          <input type="file" class="form-control-file" name="berkas" required="" id="berkas">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-user btn-block p-3 kirim">
        K I R I M
      </button>
    </form>
    <?php 
        if (isset($_POST['submit'])) {
          echo '<p class="p-3 mb-2 bg-danger text-white">'
          .$tnik.'<br>'
          .$thp.'<br>'
          .$tkat.'<br>'
          .$tkec.
          '</p>'; 
        }
     ?>
    
    <hr>

 <?php 
	include 'footer.php';
 ?>