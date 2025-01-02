<?php
session_start();
require_once("config/koneksi.php");

if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email']; 
    $password = $_POST['password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM `pelanggan` WHERE email = '$email'");

   if(mysqli_num_rows($sql) > 0){
    $message[] = 'Email Sudah Terdaftar Di Akun Lain, Masukkan Email Lain';
   }else{
      $insert = mysqli_query($koneksi, "INSERT INTO `pelanggan`(nama, no_telp, alamat, email, password)
      VALUES('$nama', '$no_telp', '$alamat', '$email', '$password')");
      $message[] = 'Akun Berhasil Terdaftar, Silahkan Login';
      }
}

if(isset($message)){
  foreach($message as $message){
     echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
  };
};

?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,300;1,200&display=swap" rel="stylesheet">
<body>
<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
	<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle navigation</span>
			</button>
			<a class="navbar-brand" href="#">
    			<img src="images/logo.png" width="40" height="40" alt="logo">
    			</a>
			<a href="index.php" class="navbar-brand brand">LAPCOM</a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php?page=home">Home</a></li>
				<li class="propClone"><a href="index.php?page=produk">Produk</a></li>
				<li class="propClone"><a href="index.php?page=keranjang">Keranjang</a></li>
				<li class="propClone"><a href="index.php?page=checkout">Checkout</a></li>
				<li class="propClone"><a href="index.php?page=kontak">kontak</a></li>
				<li class="propClone"><a href="loginus.php">Login</a></li>
			</ul>
		</div>
	</div>
	</nav>

<div class="form-containerr">
<form action="" method="post">
    <h3 class="title">Daftar</h3>
    <input type="text" name="nama" placeholder="Masukkan Nama" class="box" required>
    <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" class="box" required>
    <input type="text" name="alamat" placeholder="Masukkan Alamat" class="box" required>
    <input type="email" name="email" placeholder="Masukkan Email" class="box" required>
    <input type="password" name="password" placeholder="Masukkan Password" class="box" required>
    <input type="submit" value="DAFTAR SEKARANG" class="form-btn" name="submit">
    <p>Sudah Punya Akun? <a href="loginus.php">LOGIN</a></p>
</form>
</div>


<!-- FOOTER =============================-->
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 Connect with LAPCOM
			</p>
			<ul class="social-iconsfooter">
				<li><a href="#"><i class="fa fa-phone"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<p>
				&copy; 2023 LAPCOM<br/>
				Design by <a href="https://instagram.com/loooow01_?igshid=ZjMyZjlvam5haG8z">Kelompok 1</a>
			</p>
		</div>
	</div>
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
</body>
</html>