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
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $this->conn->query($sql);
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
        
            if ($user['role'] == "admin") {
                header("location: admin.php");
            } elseif ($user['role'] == "member") {
                header("location: halaman_user.php");
            }
        } else {
            echo "<script>alert('username atau password salah');</script>";
            echo "<script> location='login.php';</script>";
        }
    }
    
    public function proses_registrasi()
    {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $username = $_POST['username'];
        $check = "SELECT * FROM user WHERE username='$username'";
        $result = $this->conn->query($check);
        $user = $result->fetch_assoc();
        if ($user>0) {
            echo "<script>alert('Username sudah ada,Silahkan buat ulang!');</script>";
            echo "<script>location='daftar.php'; </script>";
        }
        $password = $_POST['password'];
        $role = $_POST['role'];
        $konfirmasi_password = $_POST['password2'];
        if ($konfirmasi_password == $password) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (nama, email, jenis_kelamin, username, password, role) VALUES 
                ('$nama', '$email', '$jenis_kelamin', '$username', '$password_hash', '$role')";
            $this->conn->query($sql);
            echo "<script> alert('Akun Berhasil Dibuat!');</script>";
            echo "<script> location= 'login.php';</script>";
        } else {
            echo "<script>alert('Password tidak sama,Silahkan ulangi!');</script>";
            echo "<script> location='daftar.php';</script>";
        }
    }

    public function pilih_produk()
    {
        $sql = "SELECT * FROM daftarcuci";
        return  $this->conn->query($sql);

        if (isset($_SESSION['pesanan'][$id_gambar])){
	    $_SESSION['pesanan'][$id_gambar]+=1;
        }
        else {
	    $_SESSION['pesanan'][$id_gambar]=1;
        }

        echo "<script>alert('Produk telah masuk ke pesanan anda');</script>";
       // echo "<script>location= 'pesanan_pembeli.php'</script>";
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

    public function select_daftarcuci()
    {
        $sql = "SELECT * FROM daftarcuci";
        return  $this->conn->query($sql);
    }

    public function select_datauser()
    {
        $sql = "SELECT * FROM user";
        return  $this->conn->query($sql);
    }

    public function delete_datauser($id_user = null)
    {
        $sql = "DELETE FROM `user` WHERE id_user = $id_user";

        $this->conn->query($sql);
        header("location: datauser.php");
    }

    public function insert_tambahdata()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $id_tipekendaraan = $_POST['tipe'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $jenis_layanan = $_POST['jenis_layanan'];
        $no_paket = $_POST['no_paket'];
        $jam = $_POST['jam'];
        $tanggal = $_POST['tanggal'];
        $noktp = $_POST['noktp'];
        $pembayaran = $_POST['pembayaran'];
        $sql = "INSERT INTO `tambahdata`(`nama`, `alamat`, `nohp`, `id_tipekendaraan`, `jenis_kendaraan`, `jenis_layanan`, `no_paket`, `jam`, `tanggal`, `noktp`, `pembayaran` ) 
        VALUES ('$nama','$alamat','$nohp','$id_tipekendaraan','$jenis_kendaraan', '$jenis_layanan', '$no_paket', '$jam', '$tanggal', '$noktp', '$pembayaran')";
        $this->conn->query($sql);
        header("location: paket.php");
    }

    public function insert_tambahdata2()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $id_tipekendaraan = $_POST['tipe'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $jenis_layanan = $_POST['jenis_layanan'];
        $no_paket = $_POST['no_paket'];
        $jam = $_POST['jam'];
        $tanggal = $_POST['tanggal'];
        $noktp = $_POST['noktp'];
        $pembayaran = $_POST['pembayaran'];
        $sql = "INSERT INTO `tambahdata`(`nama`, `alamat`, `nohp`, `id_tipekendaraan`, `jenis_kendaraan`, `jenis_layanan`, `no_paket`, `jam`, `tanggal`, `noktp`, `pembayaran` ) 
        VALUES ('$nama','$alamat','$nohp','$id_tipekendaraan','$jenis_kendaraan', '$jenis_layanan', '$no_paket', '$jam', '$tanggal', '$noktp', '$pembayaran')";
        $this->conn->query($sql);
        header("location: admin.php");
    }

    public function update_tambahdata()
    {
        $id_booking = $_POST['id_booking'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $id_tipekendaraan = $_POST['tipe'];
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $jenis_layanan = $_POST['jenis_layanan'];
        $no_paket = $_POST['no_paket'];
        $jam = $_POST['jam'];
        $tanggal = $_POST['tanggal'];
        $noktp = $_POST['noktp'];
        $pembayaran = $_POST['pembayaran'];
        $sql = "UPDATE `tambahdata` SET `nama`='$nama',`alamat`='$alamat',`nohp`='$nohp',`id_tipekendaraan`='$id_tipekendaraan',`jenis_kendaraan`='$jenis_kendaraan',
        `jenis_layanan`='$jenis_layanan',`no_paket`='$no_paket',`jam`='$jam',`tanggal`='$tanggal',`noktp`='$noktp',`pembayaran`='$pembayaran' WHERE id_booking =$id_booking";
        $this->conn->query($sql);
        header("location: admin.php");
    }

    public function delete_tambahdata($id_booking = null)
    {
        $sql = "DELETE FROM `tambahdata` WHERE id_booking = $id_booking";

        $this->conn->query($sql);
        header("location: admin.php");
    }

    public function insert_daftarcuci()
    {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];
        $sql = "INSERT INTO `daftarcuci`(`jenis`, `harga`, `gambar` ) 
        VALUES ('$jenis','$harga','$gambar')";
        $this->conn->query($sql);
        header("location: daftar_layanan.php");
    }

    public function update_daftarcuci()
    {
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $gambar = $_POST['gambar'];
        $id_gambar = $_POST['id_gambar'];
        $sql = "UPDATE `daftarcuci` SET `jenis`='$jenis',`harga`='$harga',`gambar`='$gambar' WHERE id_gambar =$id_gambar"; 
        $this->conn->query($sql);
        header("location: daftar_layanan.php");
    }

    public function delete_daftarcuci($id_gambar = null)
    {
        $sql = "DELETE FROM `daftarcuci` WHERE id_gambar = $id_gambar";

        $this->conn->query($sql);
        header("location: daftar_layanan.php");
    }
}
$koneksi = new koneksi();

if (isset($_GET['delete_tambahdata'])) {
	$koneksi->delete_tambahdata($_GET['delete_tambahdata']);
}

if (isset($_GET['insert_tambahdata'])){
    $koneksi->insert_tambahdata();
}

if (isset($_GET['insert_tambahdata2'])){
    $koneksi->insert_tambahdata2();
}

if (isset($_GET['update_tambahdata'])) {
	$koneksi->update_tambahdata();
}

if (isset($_GET['update_daftarcuci'])) {
	$koneksi->update_daftarcuci();
}

if (isset($_GET['insert_daftarcuci'])) {
	$koneksi->insert_daftarcuci();
}

if (isset($_GET['delete_daftarcuci'])) {
	$koneksi->delete_daftarcuci($_GET['delete_daftarcuci']);
}

if (isset($_GET['delete_datauser'])) {
	$koneksi->delete_datauser($_GET['delete_datauser']);
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
if (isset($_GET['pilih_produk'])) {
	$koneksi->pilih_produk();
}
?>