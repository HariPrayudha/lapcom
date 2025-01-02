<!DOCTYPE html>
<?php
	session_start();
	require_once("config/koneksi.php");
	if (isset($_GET['action']) && $_GET['action'] == "logout") {
		session_destroy();
		header('location: index.php');
		exit;
	}
	
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
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-homeimage">
					<div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
						 WELCOME TO LAPCOM
					</div>
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
						 Menyediakan Berbagai Jenis Komputer dan Laptop 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>


<!-- STEPS =============================-->
<div class="item content">
	<div class="container toparea">
		<div class="row text-center">
			<div class="col-md-4">
				<div class="col editContent">
					<span class="numberstep"><i class="fa fa-desktop"></i></span>
					<h3 class="numbertext">Cari Komputer</h3>
					<p>
						 Terdapat Banyak Sekali Laptop dan Komputer yang Tersedia di Toko Kami
					</p>
				</div>
				<!-- /.col-md-4 -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-keyboard-o"></i></span>
					<h3 class="numbertext">Accessories</h3>
					<p>
						Terdapat Juga Berbagai Accesssories Yang Anda Butuhkan
					</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-download"></i></span>
					<h3 class="numbertext">Install</h3>
					<p>
						 Disini Juga Bisa Melakukan Instalasi Windows dan Software
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<!-- LATEST ITEMS =============================-->
<section class="item content">
	<div class="container">
		<div class="row">
			<?php
			if(isset($_GET['page'])){
				$halaman = $_GET['page'];
			}else{
				$halaman = "";
			}

			if($halaman == ""){
				include "page/home.php";
			}else if(!file_exists("page/$halaman.php")){
				echo "halaman yang dicari tidak ditemukan";
			}else{
				include "page/$halaman.php";
			}
			?>
		</div>
</div>
</section>

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
<script>
//----HOVER CAPTION---//	  
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>
</body>
</html>