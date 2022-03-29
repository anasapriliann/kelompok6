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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Tubes</title>
	<style type="text/css">
		.topnav form button, a, input{
			min-height: 30px;
			max-width: 390px;
			color: black;
			
	}
	</style>
  </head>
  <body style="background-color: ;">
        <div class="container">
		<!-- Button trigger modal -->
        <br>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal">
			Tambah Data Booking
		</button>
		<a href="halaman_user.php" class="btn btn-primary">User</a>
		<a href="koneksi.php?proses_logout" type="submit" name="logout" class="btn btn-danger">Keluar</a>
</div>
        <div class = 'text-center'>
        <h1>Daftar Pelanggan Yang Sudah Booking</h1>
</div>
		<center><table border="2" cellpadding="20" cellspacing="0"></center>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
                    <th>No HP</th>
                    <th>Tipe Kendaraan</th>
					<th>Jenis Kendaraan</th>
                    <th>NO KTP</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$tambahdata = $koneksi->select_tambahdata();
				$no = 1;
				 ?>
				<?php foreach ($tambahdata as $row): ?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $row['nama'] ?></td>
						<td><?= $row['alamat'] ?></td>
						<td><?= $row['nohp'] ?></td>
                        <td><?= $row['tipe_kendaraan'] ?></td>
                        <td><?= $row['jenis_kendaraan'] ?></td>
                        <td><?= $row['noktp'] ?></td>
						<td>
							<a href="" class="badge badge-success" data-toggle="modal" data-target="#tambahdataModal<?= $row['id_booking']  ?>">Edit</a>
							<a href="koneksi.php?delete_tambahdata=<?= $row['id_booking'] ?>" class="badge badge-danger">Hapus</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>		
	</div>

<?php foreach ($tambahdata as $row): ?>
	<!-- Modal EDIT -->
	<div class="modal fade" id="tambahdataModal<?= $row['id_booking'] ?>" tabindex="-1" aria-labelledby="tambahdataModal<?= $row['id_booking']  ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahdataModal<?= $row['id_booking']  ?>Label">Ubah Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="koneksi.php?update_tambahdata" method="post">
					<input type="hidden" name="id_booking" value="<?= $row['id_booking'] ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
						</div>
						<div class="form-group">
							<label>No HP</label>
							<input type="text" name="nohp" class="form-control" value="<?= $row['nohp'] ?>">
						</div>
                        <select name="tipe" class="form-control">
            		<div class="form-group">
                			<option selected disabled>Pilih Tipe Kendaraan</option>
                			<?php
							$tipekendaraan = $koneksi->select_tipekendaraan();
							foreach ($tipekendaraan as $item): ?>
								<?php if ($item['tipekendaraan'] = $row['tipekendaraan']) ?>
									<option value="<?= $item['id_tipekendaraan'] ?>" selected > <?= $item['tipe_kendaraan'] ?></option>
								<?php //else: ?>
									<option value="<?= $item['id_tipekendaraan'] ?>"> <?= $item['tipe_kendaraan'] ?></option>
								<?php //endif ?>
							<?php endforeach ?> 
            				</div>
        						</select>
                        <div class="form-group">
							<label>Jenis Kendaraan</label>
							<input type="text" name="jenis" class="form-control" value="<?= $row['jenis_kendaraan'] ?>">
						</div>
                        <div class="form-group">
							<label>No KTP</label>
							<input type="text" name="noktp" class="form-control" value="<?= $row['noktp'] ?>">
						</div>
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


<!-- Modal -->
<div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="tambahdataModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahdataModalLabel">Tambah Pengguna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="koneksi.php?insert_tambahdata" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control">
					</div>
					<div class="form-group">
							<label>No HP</label>
							<input type="text" name="nohp" class="form-control">
						</div>
                    <select name="tipe" class="form-control">
            		<div class="form-group">
                			<option selected disabled>Pilih Tipe Kendaraan</option>
                			<?php
							$tipekendaraan = $koneksi->select_tipekendaraan();
							foreach ($tipekendaraan as $row): ?>
								<option value="<?= $row['id_tipekendaraan'] ?>"> <?= $row['tipe_kendaraan'] ?></option>
								<?php endforeach ?> 
            				</div>
        						</select>
                        <div class="form-group">
							<label>Jenis Kendaraan</label>
							<input type="text" name="jenis" class="form-control">
						</div>
                        <div class="form-group">
							<label>No KTP</label>
							<input type="text" name="noktp" class="form-control">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>