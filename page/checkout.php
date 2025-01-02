<?php
if(isset($_POST['submit_pesanan'])){

   $nama = $_POST['nama'];
   $nomor = $_POST['nomor'];
   $email = $_POST['email'];
   $metode = $_POST['metode'];
   $alamat = $_POST['alamat'];
   $jalan = $_POST['jalan'];
   $kota = $_POST['kota'];
   $provinsi = $_POST['provinsi'];
   $negara = $_POST['negara'];
   $kode_pos = $_POST['kode_pos'];

   $sql = mysqli_query($koneksi, "SELECT * FROM `keranjang`");
   $total_harga = 0;
   if(mysqli_num_rows($sql) > 0){
      while($result = mysqli_fetch_assoc($sql)){
         $nama_produk[] = $result['nama'] .' ('. $result['jumlah'] .') ';
         $sub_harga = $result['harga'] * $result['jumlah'];
         $total_harga += $sub_harga;
      };
   };

   $total_produk = implode(', ',$nama_produk);
   $detail_sql = mysqli_query($koneksi, "INSERT INTO `pesanan`(nama, nomor, email, metode, alamat, jalan, kota, provinsi, negara, kode_pos, total_produk, total_harga) VALUES('$nama','$nomor','$email','$metode','$alamat','$jalan','$kota','$provinsi','$negara','$kode_pos','$total_produk','$total_harga')") or die('query failed');

   if($sql && $detail_sql){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>TERIMA KASIH SUDAH ORDER!!</h3>
         <div class='order-detail'>
            <span>".$total_produk."</span>
            <span class='total'> Total Harga : Rp.".number_format($total_harga)."</span>
         </div>
         <div class='customer-details'>
            <p> Nama : <span>".$nama."</span> </p>
            <p> Nomor : <span>".$nomor."</span> </p>
            <p> Email : <span>".$email."</span> </p>
            <p> Alamat : <span>".$alamat.", ".$jalan.", ".$kota.", ".$provinsi.", ".$negara." - ".$kode_pos."</span> </p>
            <p> Metode Pembayaran : <span>".$metode."</span> </p>
         </div>
            <a href='index.php?page=produk' class='btn btn-warning'>Lanjut Berbelanja</a>
            <a href='profiluser.php' class='btn btn-primary'>Ke Akun Saya</a>
         </div>
      </div>
      ";

      $delete_sql = mysqli_query($koneksi,"DELETE FROM `keranjang`");
       if($delete_sql){
           echo '';
       }else{
           echo '';
       }
   }

}

?>

<body>
<div class="container">
<section class="checkout-form">
   <h1 class="heading" align="center">CHECKOUT PRODUCT</h1>
   <form action="" method="post">
   <div class="display-order">
      <?php
         $select_sql = mysqli_query($koneksi, "SELECT * FROM `keranjang`");
         $total = 0;
         $total_akhir = 0;
         $sub_harga = 0 ;
         if(mysqli_num_rows($select_sql) > 0){
            while($result = mysqli_fetch_assoc($select_sql)){
            $sub_harga = $result['harga'] * $result['jumlah'];
            $total_akhir = $total += $sub_harga;
      ?>
      <span><?= $result['nama']; ?>(<?= $result['jumlah']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>KERANJANG ANDA MASIH KOSONG!!!</span></div>";
      }
      ?>
      <span class="grand-total"> Total Harga : Rp.<?php echo number_format($total_akhir); ?></span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Nama Anda</span>
            <input type="text" placeholder="Masukkan Nama Anda" name="nama" required>
         </div>
         <div class="inputBox">
            <span>Nomor Anda</span>
            <input type="text" placeholder="Masukkan Nomor Anda" name="nomor" required>
         </div>
         <div class="inputBox">
            <span>Email Anda</span>
            <input type="email" placeholder="Masukkan Email Anda" name="email" required>
         </div>
         <div class="inputBox">
            <span>Metode Pembayaran</span>
            <select name="metode">
               <option value="COD" selected>COD</option>
               <option value="E-Wallet">E-Wallet</option>
               <option value="Bank Transfer">Bank Transfer</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Alamat</span>
            <input type="text" placeholder="Masukkan Nama Jalan" name="alamat" required>
         </div>
         <div class="inputBox">
            <span>Detail Alamat</span>
            <input type="text" placeholder="Masukkan Nomor Rumah" name="jalan" required>
         </div>
         <div class="inputBox">
            <span>Kota</span>
            <input type="text" placeholder="Masukkan Kota" name="kota" required>
         </div>
         <div class="inputBox">
            <span>Provinsi</span>
            <input type="text" placeholder="Masukkan Provinsi" name="provinsi" required>
         </div>
         <div class="inputBox">
            <span>Negara</span>
            <input type="text" placeholder="Masukkan Negara" name="negara" required>
         </div>
         <div class="inputBox">
            <span>Kode Pos</span>
            <input type="text" placeholder="Masukkan Kode Pos" name="kode_pos" required>
         </div>
      </div>
      <div class="checkout-btn">
      <input type="submit" value="PESAN SEKARANG" name="submit_pesanan" class="btn btn-primary">
      </div>
   </form>
</section>
</div>
</body>
</html>