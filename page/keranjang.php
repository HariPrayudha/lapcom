<?php
if(isset($_POST['update_produk'])){
   $update_jumlah = $_POST['update_jumlah'];
   $update_id = $_POST['update_id'];
   $update_jumlah_query = mysqli_query($koneksi, "UPDATE `keranjang` SET jumlah = '$update_jumlah' WHERE id_produk = '$update_id'");
   if($update_jumlah_query){
        $message[] = 'Produk Berhasil Diupdate';
   }else{
        $message[] = 'Produk Gagal Diupdate';
  }
};

if(isset($_GET['action'])){
   if($_GET['action']=="hapus"){
       $id = $_GET['id'];
       $sql = mysqli_query($koneksi,"DELETE FROM `keranjang` WHERE id_produk = '$id'");
       if($sql){
        $message[] = 'Produk Berhasil Dihapus';
       }else{
        $message[] = 'Produk Gagal Dihapus';
       }
   }
}

if(isset($_GET['action'])){
   if($_GET['action']=="hapus_semua"){
       $id = $_GET['id'];
       $sql = mysqli_query($koneksi,"DELETE FROM `keranjang`");
       if($sql){
        $message[] = 'Produk Berhasil Dihapus';
       }else{
        $message[] = 'Produk Gagal Dihapus';
       }
   }
}
if(isset($message)){
	foreach($message as $message){
	   echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
	};
  };
?>

<body>
<div class="container">
<section class="shopping-cart">
   <h1 class="heading" align="center">KERANJANG ANDA</h1>
   <table>
      <thead>  
         <th>GAMBAR</th>
         <th>NAMA PRODUK</th>
         <th>HARGA</th>
         <th>JUMLAH</th>
         <th>TOTAL HARGA</th>
         <th>ACTION</th>
      </thead>
      <tbody>

      <?php 
$sql = mysqli_query($koneksi, "SELECT * FROM `keranjang`");
$total_akhir = 0;
if (mysqli_num_rows($sql) > 0) {
    while ($result = mysqli_fetch_assoc($sql)) {
        $sub_harga = $result['harga'] * $result['jumlah']; 
        $total_akhir += $sub_harga;  
?>
<tr>
    <td><img src="admin/gambar/<?php echo $result['gambar']; ?>" height="100" alt=""></td>
    <td><?php echo $result['nama']; ?></td>
    <td>Rp.<?php echo number_format($result['harga']); ?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="update_id" value="<?php echo $result['id_produk']; ?>">
            <input type="number" name="update_jumlah" min="1" value="<?php echo $result['jumlah']; ?>">
            <input type="submit" value="UPDATE" name="update_produk" class="btn btn-warning">
        </form>
    </td>
    <td>Rp.<?php echo number_format($sub_harga); ?></td>
    <td><a href="index.php?page=keranjang&action=hapus&id=<?php echo $result['id_produk']; ?>" onclick="return confirm('Hapus produk ini dari keranjang?')" class="btn btn-danger"> <i class="fa fa-trash"></i> HAPUS</a></td>
</tr>
<?php
    }
}
?>

<tr class="table-bottom">
<td><a href="index.php?page=produk" class="btn btn-warning" style="margin-top: 0;"> <i class="fa fa-shopping-cart"></i> KEMBALI BERBELANJA</a></td>
<td colspan="3">Total Harga</td>
<td>Rp.<?php echo number_format($total_akhir);?></td>
<td><a href="index.php?page=keranjang&action=hapus_semua&id=" onclick="return confirm('Yakin ingin menghapus semua produk?');" class="btn btn-danger <?= ($total_akhir > 1)?'':'disabled'; ?>"> <i class="fa fa-trash"></i> HAPUS SEMUA </a></td>
</tr>
</tbody>
</table>

<div class="checkout-btn">
   <?php
   if (isset($_SESSION['email'])) {
       echo '<a href="index.php?page=checkout" class="btn btn-primary' . ($total_akhir > 1 ? '' : ' disabled') . '">PROSES KE CHECKOUT</a>';
   } else {
       echo '<p>SILAHKAN LOGIN UNTUK MELANJUTKAN KE CHECKOUT <br> <a href="loginus.php" class="btn btn-primary">LOGIN</a></p>';
   }
   ?>
</div>

</section>
</div>
</body>
</html>