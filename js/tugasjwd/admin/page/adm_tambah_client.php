<?php
if(isset($_POST['submit_client'])){
    $id_client = $_POST['id_client'];
    $nama_client = $_POST['nama_client'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat']; 
    $status = $_POST['status'];
    if(empty($id_client) || empty($nama_client)){
        echo '<div class="warning"> Data tidak boleh kosong</div>';
    }else{
        $insert = mysqli_query($koneksi,
            "INSERT INTO client(id_client, nama_client, jenis_kelamin, alamat, status)
            VALUES('$id_client','$nama_client','$jenis_kelamin','$alamat','$status')");
        if($insert){
            echo '<div class="success">Client Berhasil disimpan</div>';
        }else{
            echo '<div class="error">Client Gagal disimpan</div>';
        }
    }
}
?>
<div class="col-lg-12">
    <section>
        <h2 align="center">Halaman Tambah Client</h2>
        <a href="index.php?page=client"> << Kembali Ke Nama Client Management </a>
        <form method="post" action="">
            <input type="text" name="id_client" placeholder="Id client" class="form-control"> <br>
            <input type="text" name="nama_client" placeholder="Nama Client" class="form-control"> <br>
            <select name="jenis_kelamin" class="form-control">
                <option value="laki_laki">laki-laki</option><br>
                <option value="perempuan">Perempuan</option><br><br>
            <input type="text" name="alamat" placeholder="alamat" class="form-control"> <br>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="non_aktif">Non Aktif</option>
            </select><br>
            <input class="btn btn-info" type="submit" name="submit_client" value="Tambah client" class="submit">
        </form>
    </section>
</div>