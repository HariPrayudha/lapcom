<?php
    if(isset($_POST['edit_galeri'])){
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

            $edit = mysqli_query($koneksi, "UPDATE galeri
            SET nama_produk='$nama_produk', Ulasan='$ulasan', gambar_produk='$nama_gambar_baru'
            WHERE id_client='$id_client'");
        }
            if($edit){
                echo '<div class="success">Galeri Berhasil diedit</div>';
            }else{
                echo '<div class="error">Galeri Gagal diedit</div>';
        }
        }
    }

$id_client = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM galeri WHERE id_client = '$id_client'");
$result = mysqli_fetch_array($sql);
?>
<div class="col-lg-6">
    <section class="panel">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset style="border: 1px solid orange;">
            <legend>Edit Galeri</legend>
            <input type="hidden"name="id_client" placehorder="Id client" class="form-control" value="<?php echo $result['id_client'];?>"><br>
            <legend>Nama Produk</legend>
            <input type="text"name="nama_produk" placehorder="Nama Produk" class="form-control"value="<?php echo $result['nama_produk'];?>"><br>
            <legend>Ulasan</legend>
            <input type="text"name="Ulasan" placehorder="Ulasan" class="form-control"value="<?php echo $result['Ulasan'];?>"><br>
            <legend>Gambar Produk</legend>
            <img src="gambar/<?php echo $result['gambar_produk']; ?>">
            <input type="file"name="gambar_produk" placehorder="Gambar Produk" class="form-control"><br>
            <input type="submit" name="edit_galeri" value="Edit Galeri" class="sumbit">
            </fieldset>
        </form>
    </section>
</div>