<?php 
include_once 'koneksi.php';
if (isset($_SESSION['login'])) {
	echo "<script> alert('Sesi anda sudah habis,Silahkan Login!');</script>";
	echo "<script> location = 'login.php'; </script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>Tubes</title>
  </head>
  <body>
  <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
          <h1 class="display-4"><span class="font-weight-bold">PANCARONA CAR WASH</span></h1>
          <hr>
          <p class="lead font-weight-bold">CAR WASH & DETAILING</p>
        </div>
      </div>
  <!-- Akhir Jumbotron -->

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container">
        <a class="navbar-brand text-white" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link mr-4" href="admin.php">HOME</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link mr-4" href="daftar_menu.php">DAFTAR MENU</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="pesanan.php">PESANAN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mr-4" href="logout.php">LOGOUT</a>
            </li>-->
          </ul>
        </div>
       </div> 
      </nav>
  <!-- Akhir Navbar -->

  <!-- Menu -->
      <div class="container">
        <a class="btn btn-success mt-3" data-toggle="modal" data-target="#daftarcuciModal">TAMBAH DAFTAR LAYANAN</a>
        <div class="row">

        <?php 
			$pilihproduk = $koneksi->pilih_produk();
			$no = 1;
		?>
          <?php foreach($pilihproduk as $result) : ?>

          <div class="col-md-4 mt-4">
            <div class="card brder-dark">
              <img src="gambar/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold">Paket <?php echo $result['paket'] ?></h5>
                <h5 class="card-title font-weight-bold"><?php echo $result['jenis'] ?></h5>
               <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                <a href="" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#daftarcuciModal<?= $row['id_gambar']  ?>">EDIT</a>
                <a href="koneksi.php?delete_daftarcuci=<?php echo $result['id_gambar']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
              </div>
            </div>
          </div>
              <?php endforeach; ?>
            </div>
          </div> 
  <!-- Akhir Menu -->

  <?php 
				$daftarcuci = $koneksi->select_daftarcuci();
				$no = 1;
				 ?>
  <?php foreach ($daftarcuci as $row): ?>
	<!-- Modal EDIT -->
	<div class="modal fade" id="daftarcuciModal<?= $row['id_gambar'] ?>" tabindex="-1" aria-labelledby="daftarcuciModal<?= $row['id_gambar']  ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="daftarcuciModal<?= $row['id_gambar']  ?>Label">Ubah Data Layanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="koneksi.php?update_daftarcuci" method="post">
					<input type="hidden" name="id_gambar" value="<?= $row['id_gambar'] ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Jenis</label>
							<input type="text" name="jenis" class="form-control" value="<?= $row['jenis'] ?>">
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="text" name="harga" class="form-control" value="<?= $row['harga'] ?>">
						</div>
						<div class="form-group">
							<label>Foto Layanan</label>
							<input type="text" name="gambar" class="form-control" value="<?= $row['gambar'] ?>">
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>

  <!-- Awal Footer -->
      <hr class="footer">
      <div class="container">
        <div class="row footer-body">
          <div class="col-md-6">
          <div class="copyright">

          </div>
          </div>

         <!-- <div class="col-md-6 d-flex justify-content-end">
          <div class="icon-contact">
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="images/icon/fb.png" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="images/icon/ig.png" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="images/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
          </div>
        </div>
      </div> -->
  <!-- Akhir Footer -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
  </body>
</html>