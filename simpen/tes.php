<?php 
include_once 'Koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>
	<div class="container-fluid mt-5">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#mahasiswaModal">
			Booking
		</button>
			<h1>daftar booking</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>No HP</th>
					<th>Tipe Kendaraan</th>
					<th>Jenis Kendaraan</th>
					<th>No KTP</th>
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
							<a href="" class="badge badge-success" data-toggle="modal" data-target="#mahasiswaModal<?= $row['id_booking']  ?>">Edit</a>
							<a href="Koneksi.php?delete_tambahdata=<?= $row['id_tambahdata'] ?>" class="badge badge-danger">Hapus</a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>		
	</div>

<?php foreach ($tambahdata as $row): ?>
	<!-- Modal EDIT -->
	<div class="modal fade" id="mahasiswaModal<?= $row['id_tambahdata'] ?>" tabindex="-1" aria-labelledby="mahasiswaModal<?= $row['id_tambahdata']  ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mahasiswaModal<?= $row['id_tambahdata']  ?>Label">Ubah Data Booking</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="Koneksi.php?update_tambahdata" method="post">
					<input type="hidden" name="id_booking" value="<?= $row['id_booking'] ?>">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="nim" class="form-control" value="<?= $row['alamat'] ?>">
						</div>
						<div class="form-group">
							<label>NO HP</label>
							<input type="text" name="kelas" class="form-control" value="<?= $row['nohp'] ?>">
						<<div class='form-group'>
       			 <select name="tipe" class="form-control" value="<?= $row['tipe'] ?>">
        			<div class=''>
                			<option disable selected>Pilih Tipe</option>
           			        <option>Minibus</option>
          				    <option>Sedan</option>
            			    <option>Motor Kecil</option>
            			    <option>Motor Gede</option>
          				  </div>
       					 </select>
        				<div class="form-group">
							<label>Jenis Kendaraan</label>
							<input type="text" name="kelas" class="form-control" value="<?= $row['jenis'] ?>">
							<div class="form-group">
							<label>Tipe Kendaraan</label>
							<input type="text" name="kelas" class="form-control" value="<?= $row['tipe'] ?>">
							<div class="form-group">
							<label>No KTP</label>
							<input type="text" name="kelas" class="form-control" value="<?= $row['noktp'] ?>">
						</div>
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
<div class="modal fade" id="mahasiswaModal" tabindex="-1" aria-labelledby="mahasiswaModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mahasiswaModalLabel">Tambah Booking</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="Koneksi.php?insert_mahasiswa" method="post">
				<div class="modal-body">
					<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" name="nim" class="form-control">
						</div>
						<div class="form-group">
							<label>NO HP</label>
							<input type="text" name="kelas" class="form-control">
						<<div class='form-group'>
       			 <select name="tipe" class="form-control">
        			<div class=''>
                			<option disable selected>Pilih Tipe</option>
           			        <option>Minibus</option>
          				    <option>Sedan</option>
            			    <option>Motor Kecil</option>
            			    <option>Motor Gede</option>
          				  </div>
       					 </select>
        				<div class="form-group">
							<label>Jenis Kendaraan</label>
							<input type="text" name="kelas" class="form-control">
							<div class="form-group">
							<label>Tipe Kendaraan</label>
							<input type="text" name="kelas" class="form-control">
							<div class="form-group">
							<label>No KTP</label>
							<input type="text" name="kelas" class="form-control">
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





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>

<?php foreach ($pilihproduk as $result) : ?>

<div class="col-md-4 mt-4">
  <div class="card brder-dark">
	<img src="gambar/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
	<div class="card-body">
	  <h5 class="card-title font-weight-bold">Paket <?php echo $result['paket'] ?></h5>
	  <h5 class="card-title font-weight-bold"><?php echo $result['jenis'] ?></h5>
	 <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
	  <a href="koneksi.php?=<?php echo $result['id_gambar']; ?>" class="btn btn-success btn-sm btn-block ">Pilih</a>
	  href="koneksi.php?=<?php echo $result['id_gambar']; ?>
	</div>
  </div>
</div>
<?php endforeach ?>
</div> 
</div>