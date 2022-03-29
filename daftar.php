<?php
//include "koneksi.php";
//if (isset($_POST['submit'])) {
//	echo "<script> alert('Anda berhasil registrasi,Silahkan Login!');</script>";
//	echo "<script> location = 'login.php'; </script>";
//}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Tugas Besar</title>
    <style>

body{
    background-color: #dee9ff;
    }

.registration-form{
	padding: 60px;
    
    }

.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 80px 100px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
    }
.registration-form input[type='text'], .registration-form input[type='password']{
    font-size: 15px;
    font-family: bold;
    display: black;
    padding: 10px;
    width: 390px;
}

.registration-form button[type='submit']{
    
}


}
</style>
  </head>
  <body style="background-color: ;">
  <div class="container">
  <!-- Content here -->
<div class = 'text-center'>
    <br>
<h1>Selamat Datang Di Pancarona CarWash</h1>
</div>
    <div class="registration-form">
        <form action="koneksi.php?proses_registrasi" method="POST">
<div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="nama" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Alamat Email">
            </div>
            <select name="jenis_kelamin" class="form-control">
            <div class="form-group">
                			<option disable selected>Jenis Kelamin</option>
                			<option>Laki-Laki</option>
                			<option>Perempuan</option>
            				</div>
        						</select>
                                <br>
            <select name="role" class="form-control">
            <div class="form-group">
                			<option disable selected>Role</option>
                			<option>admin</option>
                			<option>member</option>
            				</div>
        						</select>
                                <br>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" id="username" placeholder="Nama Pengguna">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" id="password" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password2"  id="password2" placeholder="Konfirmasi Kata Sandi">
            </div>
            <br>
    <center><button type="submit" class="btn btn-primary" name="submit">Buat Akun</button>
    <a href="login.php" class="btn btn-primary">Login</a></center>
</div>
</form>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
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