<?php 
include_once('koneksi.php');
if (isset($_SESSION['login'])) {
	echo "<script> alert('Sesi anda sudah habis,Silahkan Login!');</script>";
	echo "<script> location = 'paket.php'; </script>";
}
//$id_menu = $_GET['id_menu'];

//$ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
//$result = mysqli_fetch_all($ambil, MYSQLI_ASSOC)

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">


    <title>Form Booking</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">Silahkan Booking</h3>
    <div class="card p-5 mb-5">
      <form action="koneksi.php?insert_tambahdata"  method="POST">
      <label>Nama</label>
		<input type="text" name="nama" class="form-control">
		<div class="form-group">
	<label>Alamat</label>
	<input type="text" name="alamat" class="form-control">
	</div>
	<div class="form-group">
	<label>NO HP</label>
		<input type="text" name="nohp" class="form-control">
</div>
        <label>Tipe</label>
       	<select name="tipe" class="form-control">
            <div class='form-group'>
            <option selected disabled>Pilih Tipe Kendaraan</option>
              <?php
							  $tipekendaraan = $koneksi->select_tipekendaraan();
							  foreach ($tipekendaraan as $row): ?>
								<option value="<?= $row['id_tipekendaraan'] ?>"> <?= $row['tipe_kendaraan'] ?></option>
							<?php endforeach ?> 
    				    </div>
       			      </select>
                    <br>
                    <div class="form-group">
		              <label>Jenis Kendaraan</label>
		              <input type="text" name="jenis_kendaraan" class="form-control">
                    </div>
                <label>Jenis</label>
                <select name="jenis_layanan" class="form-control">
                <div class='form-group'> 
                <option disabled selected>Jenis Layanan</option>
           		<option>In The Workshop</option>
          	    <option>Home Service</option>
    				  </div>
       			 </select>
                    <br>
                    <label>Paket</label>
                    <select name="no_paket" class="form-control">
                <div class='form-group'>
                    <option disabled selected>Pilih Paket</option>
           	  	<option>1</option>
          	    <option>2</option>
                <option>3</option>
			          <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
    				  </div>
       			 </select>
                    <div class="form-group">
                    <label>Jam</label>
		<input type="time" name="jam" class="form-control">
			</div>
            <div class="form-group">
            <label>Tanggal</label>
		<input type="date" name="tanggal" class="form-control">
			</div>
            <div class="form-group">
            <label>No KTP</label>
		<input type="text" name="noktp" class="form-control">
			</div>
            <label>Pembayaran</label>
            <select name="pembayaran" class="form-control">
                <div class='form-group'> 
                <option disabled selected>Metode Pembayaran</option>
           		<option>cash</option>
          	    <option>debit</option>
    				  </div>
       			 </select>
		</div>
			</div>
                </div>
       <center> <button type="submit" class="btn btn-primary" name="tambah">Booking</button></center>
       <br>
       <center> <a href="halaman_user.php" class="btn btn-primary" name="tambah">Kembali</a></center>
       <br>
       <br>
  </div>
  </div>
</form>
  <!-- Akhir Form Registrasi --> 


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>