<?php

session_start();
	require_once("config/koneksi.php");

if(isset($_POST['edit_profil'])){
    $email = $_SESSION['email'];
    $gambar = $_FILES['gambar']; 
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    
    if($gambar != ""){
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar['name']);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar['name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
        
        $edit = mysqli_query($koneksi, "UPDATE pelanggan
        SET gambar='$nama_gambar_baru', nama='$nama', no_telp='$no_telp', alamat='$alamat'
        WHERE email='$email'");
        }
        if($edit){
            $message[] = 'Profil Berhasil Diedit';
        }else{
            $message[] = 'Profil Gagal Diedit';
        }
        }
    }

    if(isset($message)){
        foreach($message as $message){
           echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
      };
$email = $_SESSION['email'];
$sql = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email = '$email'");
$result = mysqli_fetch_assoc($sql);
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

<section class="form-container update-form">
<form action="" method="post" enctype="multipart/form-data">
   <a href="profiluser.php"> << Kembali Ke Profil User </a>
   <h3>Edit Profil</h3>
   <input type="file" name="gambar" placeholder="Masukkan Foto Anda" value="<?php echo $result['gambar']; ?>" class="box" maxlength="50">
   <input type="text" name="nama" placeholder="Masukkan Nama Anda" value="<?php echo $result['nama']; ?>" class="box" maxlength="50">
   <input type="number" name="no_telp" placeholder="Masukkan Nomor Telp Anda" value="<?php echo $result['no_telp']; ?>" class="box" maxlength="50">
   <input type="text" name="alamat" placeholder="Masukkan Alamat Anda" value="<?php echo $result['alamat']; ?>" class="box" maxlength="50">
   <input type="submit" value="Edit Sekarang" name="edit_profil" class="btn btn-primary">
</form>
</section>
<?php     
?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
</body>
</html>