<?php
if (isset($_POST['submit_produk'])) {
    $id_produk = $_POST['id_produk'];
    $gambar = $_FILES['gambar'];
    $harga = $_POST['harga'];
    $nama = $_POST['nama'];
    $spek = $_POST['spek'];

    $insert = false; // Inisialisasi variabel $insert

    if ($gambar != "") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.', $gambar['name']);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar['name'];

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if (move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru)) {
                $insert = mysqli_query($koneksi,
                    "INSERT INTO produk(id_produk, gambar, harga, nama, spek)
                     VALUES('$id_produk','$nama_gambar_baru','$harga','$nama','$spek')");
            }
        } else {
            echo "Gambar hanya bisa jpg atau png";
        }
    }

    if ($insert) {
        echo '<div class="success">Produk Berhasil disimpan</div>';
    } else {
        echo '<div class="error">Produk Gagal disimpan</div>';
    }
}
?>

<div class="col-lg-12">
    <section>
        <h2 align="center">Halaman Tambah Produk</h2>
        <a href="index.php?page=produk"> << Kembali Ke Produk Management </a>
        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="id_produk" placeholder="Id Produk" class="form-control"> <br>
            <input type="file" name="gambar" placeholder="Gambar Produk" class="form-control"> <br>
            <input type="text" name="harga" placeholder="Harga Produk" class="form-control"> <br>
            <input type="text" name="nama" placeholder="Nama Produk" class="form-control"> <br>
            <input type="text" name="spek" placeholder="Spesifikasi Produk" class="form-control"> <br>
            <input type="submit" name="submit_produk" value="Tambah Produk" class="submit">
        </form>
    </section>
</div>