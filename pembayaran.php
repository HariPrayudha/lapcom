<?php
session_start();
require_once("config/koneksi.php");	

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
 }else{
	$email = '';
	header('location:index.php');
 };

 if(isset($_POST['submit'])){
    $bukti_tf = $_FILES['bukti_tf']; 
    
    if($bukti_tf != ""){
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $bukti_tf['name']);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['bukti_tf']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$bukti_tf['name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'admin/buktitf/'.$nama_gambar_baru);

            $insert = mysqli_query($koneksi,
            "UPDATE pesanan SET bukti_tf = '$nama_gambar_baru' WHERE email = '$email'");
        }
        if($insert){
            $message[] = 'Bukti Transfer Berhasil Terkirim';
        }else{
            $message[] = 'Bukti Transfer Gagal Terkirim';
        }
    }else{
        $message[] = 'Gambar hanya bisa jpg atau png';
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
				<li class="propClone"><a href="index.php?page=kontak">kontak</a></li>
				<?php
				if (isset($_SESSION['email'])) {
				echo '<li class="propClone"><a href="profiluser.php">Akun Saya</a></li>';
    			echo '<li class="propClone"><a href="index.php?action=logout">Logout</a></li>';
				} else {
    			echo '<li class="propClone"><a href="loginus.php">Login</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
	</nav>

<section class="orders">
<h1 class="title">Pesanan Kamu</h1>
<div class="box-container">
<div class="box">
<a href="ordersaya.php"> << Kembali Ke Data Pesanan</a><br>
    <img src="images/qris.jpg" width="450" height="450" alt="logo">
    <form action="" method="post" enctype="multipart/form-data">
    <h4>Masukkan Bukti Pembayaran</h4>
    <input type="file" name="bukti_tf" placeholder="Masukkan Bukti Transfer"><br>
    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
</body>
</html>