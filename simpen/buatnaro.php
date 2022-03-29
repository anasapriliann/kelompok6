<?php
class koneksi
{
    var $conn;
    function__construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "latihan";
        $this->conn = mysqli_connect($servername, $username, $password, $databasename);
    }
    
    public function select_latihan1()
    {
        $sql = "SELECT * FROM latihan1";
        return  $this->conn->query($sql);
    }
function insert_latihan1()
{
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tipe_kendaraan = $_POST['tipe'];
    $jenis_kendaraan = $_POST['pilih'];
    $sql = "INSERT INTO `latihan1`(`nama`, `alamat`, `tipe_kendaraan`, `jenis_kendaraan`) VALUES ('$nama','$alamat','$tipe_kendaraan','$jenis_kendaraan')";
    $result = $this->conn->query($sql);
    header('location: list.php');
}

$koneksi = new koneksi();
if (isset($_GET['insert_latihan'])){
    $koneksi->insert_latihan();
}
?>

<div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" placeholder="Password">
            </div>

------------------------------------------------------------------------------------------------------
            <form action = "" method = "post">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                <input type="email" name="email" class="form-control" placeholder="Username">
                </div>
                        </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                            </div>

                            
//include "";

//if(isset($_POST['submit'])){
//mysqli_query($koneksi, "insert into latihan1 set  
//username = '$_POST[username]',
//password = '$_POST[password]',");

//echo "Data telah tersimpan";

//}

<select name="tipe" class="form-control">
            		<div class="form-group">
                			<option selected disabled>Pilih Tipe Kendaraan</option>
                			<option>Minibus</option>
                			<option>Sedan</option>
							<option>Motor Kecil</option>
							<option>Motor Besar</option>
            				</div>
        						</select>

                                <?php
							$tipekendaraan = $koneksi->select_tipekendaraan();
							foreach ($tipekendaraan as $item): ?>
							<?php if ($item['id_tipekendaraan'] as $row['id_tipekendaraan']) ?>
								<option value="<?= $item['id_tipekendaraan'] ?>" selected > <?= $item['tipekendaraan'] ?></option>
							<?php else:	?>
								<option value="<?= $item['id_tipekendaraan'] ?>"> <?= $item['tipekendaraan'] ?></option>
								<?php endif ?>
								<?php endforeach ?> 

                                <?php 
class koneksi
{
    var $conn;
    function __construct()
    {
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "tubes";
        $this->conn = mysqli_connect($servername, $username, $password, $databasename);
    }
    
    public function proses_logout()
    {
        session_destroy();
        echo "<script> alert('Anda berhasil Logout');</script>";
        echo "<script> location = 'login.php'; </script>";
    }

    public function proses_login()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
        $result = $this->conn->query($sql);

        if ($result->fetch_assoc() > 0) {
            $_SESSION['username'] = 'login';
            header("location: halaman_admin.php");
        } 
        else {
            echo "<script>alert('username atau password salah');</script>";
            echo "<script> location='login.php';</script>";
        }
    }
    
    public function proses_registrasi()
    {
        if ($_POST['password1'] != $_POST['password2']) {
            echo "<script> alert('Pastikan password anda benar');</script>";
            echo "<script> location= 'daftar.php'; </script>";
        }
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $username = $_POST['username'];
        $password = md5($_POST['password1']);
        $password = md5($_POST['password2']);

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->fetch_assoc() > 0 ) {
            if ($result->fetch_assoc() > 0 ) {
            echo "<script> alert('Username sudah digunakan');</script>";
            echo "<script> location= 'daftar.php';</script>";
        } 
        else {
            $sql = "INSERT INTO user (nama, email, jenis_kelamin, username, password) VALUES ('$nama', '$email', '$jenis_kelamin', '$username', '$password')";
            $this->conn->query($sql);

            echo "<script>alert('Anda Berhasil Registrasi!Silahkan Login');</script>";
            echo "<script> location='login.php';</script>";
        }

    }

    public function select_tambahdata()
    {
        $sql = "SELECT * FROM tambahdata JOIN tipekendaraan ON tambahdata.id_tipekendaraan = tipekendaraan.id_tipekendaraan";
        return  $this->conn->query($sql);
    }

    public function select_tipekendaraan()
    {
        $sql = "SELECT * FROM tipekendaraan";
        return  $this->conn->query($sql);
    }

    public function insert_tambahdata()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $tipe_kendaraan = $_POST['tipe'];
        $jenis_kendaraan = $_POST['jenis'];
        $noktp = $_POST['noktp'];
        $sql = "INSERT INTO `tambahdata`(`nama`, `alamat`, `nohp`, `id_tipekendaraan`, `jenis_kendaraan`, `noktp` ) 
        VALUES ('$nama','$alamat','$nohp','$tipe_kendaraan','$jenis_kendaraan', '$noktp')";
        $this->conn->query($sql);
        header("location: halaman_admin.php");
    }

    public function update_tambahdata()
    {
        $id_booking = $_POST['id_booking'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $tipe_kendaraan = $_POST['tipe'];
        $jenis_kendaraan = $_POST['jenis'];
        $noktp = $_POST['noktp'];
        $sql = "UPDATE `tambahdata` SET `nama`='$nama',`alamat`='$alamat',`nohp`='$nohp',`id_tipekendaraan`='$tipe_kendaraan',`jenis_kendaraan`='$jenis_kendaraan',`noktp`='$noktp' WHERE id_booking =$id_booking";
        $this->conn->query($sql);
        header("location: halaman_admin.php");
    }

    public function delete_tambahdata($id_booking = null)
    {
        $sql = "DELETE FROM `tambahdata` WHERE id_booking = $id_booking";

        $this->conn->query($sql);
        header("location: halaman_admin.php");
    }
}
$koneksi = new koneksi();

if (isset($_GET['delete_tambahdata'])) {
	$koneksi->delete_tambahdata($_GET['delete_tambahdata']);
}

if (isset($_GET['insert_tambahdata'])){
    $koneksi->insert_tambahdata();
}

if (isset($_GET['update_tambahdata'])) {
	$koneksi->update_tambahdata();
}

if (isset($_GET['proses_logout'])) {
	$koneksi->proses_logout();
}

if (isset($_GET['proses_login'])) {
	$koneksi->proses_login();
}

if (isset($_GET['proses_registrasi'])) {
	$koneksi->proses_registrasi();
}
?>