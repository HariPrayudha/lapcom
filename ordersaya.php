<?php
session_start();
require_once("config/koneksi.php");	

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
 }else{
	$email = '';
	header('location:index.php');
 };
 
 if(isset($_POST['batal'])){
	$email = $_SESSION['email'];

	$sql = mysqli_query($koneksi, "UPDATE pesanan SET status = 'Dibatalkan' WHERE email = '$email'");
	if($sql){
	$message[] = 'Pesanan Berhasil Dibatalkan';
	} else {
	$message[] = 'Pesanan Gagal Dibatalkan';
	}
}

if(isset($message)){
	foreach($message as $message){
	   echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
	};
  };

  $angka_acak = rand(1, 999999999);
  $resi = 'LPCM'.$angka_acak;
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
<div class="box-container">

<?php
$sql = mysqli_query($koneksi, "SELECT * FROM `pesanan` WHERE email = '$email'");
if (mysqli_num_rows($sql) > 0) {
    while ($result = mysqli_fetch_assoc($sql)) {
?>
<div class="box"><br><br>
   <p class="date"><i class="fa fa-calendar"></i><span></span></p>
   <p><i class="fa fa-user"></i> Nama : <span><?= $result['nama']; ?></span></p>
   <p><i class="fa fa-phone"></i> Nomor : <span><?= $result['nomor']; ?></span> </p>
   <p><i class="fa fa-envelope"></i> Email : <span><?= $result['email']; ?></span> </p>
   <p><i class="fa fa-map-marker"></i> Alamat : <span><?= $result['alamat'] . ' ' . $result['jalan'] . ' ' . $result['kota'] . ' ' . $result['provinsi'] . ' ' . $result['negara'] . ' ' . $result['kode_pos']; ?></span></p>
   <p><i class="fa fa-credit-card"></i> Metode Pembayaran : <span><?= $result['metode']; ?></span></p>
   <p><i class="fa fa-shopping-cart"></i> Pesanan Kamu : <span><?= $result['total_produk']; ?></span></p>
   <p><i class="fa fa-money"></i> Total Harga : <span>Rp.<?= number_format($result['total_harga']); ?></span></p>
   <p class="status" style="color:<?php if($result['status'] == 'Diterima'){echo 'green';}elseif($result['status'] == 'Dibatalkan'){echo 'red';}else{echo 'orange';}; ?>"><?= $result['status']; ?></p>
   <?php if ($result['status'] !== 'Diterima' && $result['status'] !== 'Dibatalkan' && $result['status'] !== 'Dikirim') { ?>
   <?php if ($result['metode'] == 'Bank Transfer' || $result['metode'] == 'E-Wallet') { ?>
   <p>*Silahkan Lakukan Pembayaran* <a href="pembayaran.php" class="btn btn-primary"> LAKUKAN PEMBAYARAN</a></p>
    <?php } ?>
	<form method="post" action="">
	<input type="hidden" name="status" value="<?php echo $result['status']; ?>">
    <input type="submit" value="BATALKAN PESANAN" name="batal" class="btn btn-danger">
	</form>
        <?php } ?>
	<?php if ($result['status'] !== 'Verifikasi Pembayaran') { ?>
        <p>NOMOR RESI: <?= $resi ?></p>
    <?php } ?>
</div>
<?php
   }
   }else{
	  echo '<p class="empty">Tidak Ada Pesanan</p>';
   }
?>
</div>
</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
</body>
</html>