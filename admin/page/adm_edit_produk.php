<?php
    if(isset($_POST['edit_produk'])){
        $id_produk = $_POST['id_produk'];
        $gambar = $_FILES['gambar']; 
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $spek = $_POST['spek'];
        if($gambar != ""){
            $ekstensi_diperbolehkan = array('png', 'jpg');
            $x = explode('.', $gambar['name']);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $angka_acak = rand(1, 999);
            $nama_gambar_baru = $angka_acak.'-'.$gambar['name'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);

            $edit = mysqli_query($koneksi, "UPDATE produk
            SET gambar='$nama_gambar_baru', harga='$harga', nama='$nama', spek='$spek'
            WHERE id_produk='$id_produk'");
        }
            if($edit){
                echo '<div class="success">Produk Berhasil diedit</div>';
            }else{
                echo '<div class="error">Produk Gagal diedit</div>';
        }
        }
    }

$id_produk = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk = '$id_produk'");
$result = mysqli_fetch_array($sql);
?>
<div class="col-lg-6">
    <section class="panel">
        <a href="index.php?page=produk"> << Kembali Ke Produk Management </a>
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset style="border: 1px solid orange;">
            <legend>Edit Produk</legend>
            <input type="hidden"name="id_produk" placehorder="Id Produk" class="form-control" value="<?php echo $result['id_produk'];?>"><br>
            <legend>Gambar Produk</legend>
            <img src="gambar/<?php echo $result['gambar']; ?>">
            <input type="file"name="gambar" placehorder="Gambar Produk" class="form-control"><br>
            <legend>Harga Produk</legend>
            <input type="text"name="harga" placehorder="Harga Produk" class="form-control"value="<?php echo $result['harga'];?>"><br>
            <legend>Nama Produk</legend>
            <input type="text"name="nama" placehorder="Nama Produk" class="form-control"value="<?php echo $result['nama'];?>"><br>
            <legend>Spesifikasi Produk</legend>
            <input type="text"name="spek" placehorder="Spesifikasi Produk" class="form-control"value="<?php echo $result['spek'];?>"><br>
            <input type="submit" name="edit_produk" value="Edit Produk" class="sumbit">
            </fieldset>
        </form>
    </section>
</div>