<?php
if(isset($_POST['submit_galeri'])){
    $id_client = $_POST['id_client'];
    $nama_produk = $_POST['nama_produk'];
    $ulasan = $_POST['Ulasan'];
    $gambar_produk = $_FILES['gambar_produk']; 
    if($gambar_produk != ""){
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar_produk['name']);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar_produk['name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

            $insert = mysqli_query($koneksi,
            "INSERT INTO galeri(id_client, nama_produk, Ulasan, gambar_produk)
            VALUES('$id_client','$nama_produk','$ulasan','$nama_gambar_baru')");
        }
        if($insert){
            echo '<div class="success">Ulasan Berhasil disimpan</div>';
        }else{
            echo '<div class="error">Ulasan Gagal disimpan</div>';
        }
    }else{
        echo"Gambar hanya bisa jpg atau png";
    }
}
?>
<div class="col-lg-12">
    <section>
        <h2 align="center">Halaman Tambah Ulasan</h2>
        <a href="index.php?page=galeri"> << Kembali Ke Ulasan Management </a>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="id_client" placeholder="Id Client" class="form-control"> <br>
            <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control"> <br>
            <input type="text" name="Ulasan" placeholder="Ulasan" class="form-control"> <br>
            <input type="file" name="gambar_produk" placeholder="Gambar Produk" class="form-control"> <br>
            <input type="submit" name="submit_galeri" value="Tambah Ulasan" class="submit">
        </form>
    </section>
</div>