<?php
if(isset($_POST['submit_keranjang'])){
    $id_produk = $_POST['id_produk'];
    $gambar = $_POST['gambar'];
    $harga = $_POST['harga'];
    $nama = $_POST['nama']; 
    $jumlah = $_POST['jumlah'];

    $sql = mysqli_query($koneksi, "SELECT * FROM `keranjang` WHERE id_produk = '$id_produk'");

   if(mysqli_num_rows($sql) > 0){
    $message[] = 'Produk Sudah Ada Di Keranjang';
   }else{
      $insert = mysqli_query($koneksi, "INSERT INTO `keranjang`(id_produk, gambar, harga, nama, jumlah)
      VALUES('$id_produk', '$gambar', '$harga', '$nama', '$jumlah')");
      $message[] = 'Produk Berhasil Ditambah Ke Keranjang';
      }
}

if(isset($message)){
  foreach($message as $message){
     echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
  };
};

?>
<div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h1 align="center">PRODUK KAMI</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div><br>
    
<?php
$sql = mysqli_query($koneksi, "SELECT * from produk");
if($sql){
  while($result=mysqli_fetch_array($sql)){?>
  <div class="services">
    <div class="container">
       <div class="row">
           <div class="col-md-4">
             <div class="service-item">
             <form method="post" action="" enctype="multipart/form-data">
               <td><img src="admin/gambar/<?php echo $result['gambar']; ?>" width="250" height="190"></td>
                <div class="down-content"><br>
                  <h3><?php echo $result['nama']; ?></h4>  
                  <h4>Rp.<?php echo number_format($result['harga']); ?></h5>
                <div style="margin-bottom: 10px;">
                </div>
                  <p><?php echo $result['spek']; ?></p>
                  <input type="hidden" name="id_produk" value="<?=$result['id_produk'] ?>">
                  <input type="hidden" name="gambar" value="<?=$result['gambar'] ?>">
                  <input type="hidden" name="nama" value="<?=$result['nama'] ?>">
                  <input type="hidden" name="harga" value="<?=$result['harga'] ?>">
                  <input type="hidden" name="spek" value="<?=$result['spek'] ?>">
                  <input type="number" name="jumlah" value="1" class="form-control">
                  <input type="submit" name="submit_keranjang" class="btn btn-primary" value="TAMBAH KE KERANJANG">
                </div>
              </form>
         </div>
  <br>
</div>
<?php     
}
}
?>