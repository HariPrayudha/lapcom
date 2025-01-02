<?php
session_start();
require_once("config/koneksi.php");	

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
 }else{
	$email = '';
	header('location:index.php');
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
<h1 class="heading">Pesanan Saya</h1>
<div class="box-container">
<?php
$sql = mysqli_query($koneksi, "SELECT * FROM `pesanan` WHERE email = '$email'");
if (mysqli_num_rows($sql) > 0) {
    while ($result = mysqli_fetch_assoc($sql)) {
        $sql2 = mysqli_query($koneksi, "SELECT * FROM `keranjang`");
        if (mysqli_num_rows($sql2) > 0) {
            while ($result2 = mysqli_fetch_assoc($sql2)) {
                $id_produk = $result2['id_produk'];
                $sql3 = mysqli_query($koneksi, "SELECT * FROM `produk` WHERE id_produk = '$id_produk'");
                if (mysqli_num_rows($sql3) > 0) {
                  while ($result3 = mysqli_fetch_assoc($sql3)) {
?>
<div class="box" <?php if($result['status'] == 'canceled'){echo 'style="border:.2rem solid red";';}; ?>>
   <a href="lihatorder.php?get_id=<?= $result['id']; ?>">
      <p class="date"><i class="fa fa-calendar"></i><span><?= $result['tanggal']; ?></span></p>
      <img src="admin/gambar/<?php echo $result3['gambar']; ?>" class="image" alt="">
      <h3 class="name"><?= $result3['nama']; ?></h3>
      <p class="price"><i class="fa fa-indian-rupee-sign"></i> <?=$result3['harga']; ?> x <?= $result2['jumlah']; ?></p>
      <p class="status" style="color:<?php if($result['status'] == 'delivered'){echo 'green';}elseif($result['status'] == 'canceled'){echo 'red';}else{echo 'orange';}; ?>"><?= $result['status']; ?></p>
   </a>
</div>
<?php
         }
      }
   }
        }
    }
}else{
   echo '<p class="empty">no orders found!</p>';
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