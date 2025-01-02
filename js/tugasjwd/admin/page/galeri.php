<div class="col-g-12"><h3>Data Galeri</h3></div>
<?php
    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"DELETE FROM galeri WHERE id_client = '$id'");
            if($sql){
                echo 'Ulasan berhasil dihapus';
            }else{
                echo 'Ulasan gagal dihapus';
            }
        }
    }
?>
<div class="col-g-12">
    <section class="panel">
        <a href="index.php?page=adm_tambah_galeri" class="btn btn-success">TAMBAH</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Ulasan</th>
            <th>Gambar Produk</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM galeri");
        $no=1;
        if($sql){
            while($result=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $result['nama_produk']; ?></td>
                    <td><?php echo $result['Ulasan']; ?></td>
                    <td><img src="gambar/<?php echo $result['gambar_produk']; ?>"></td>
                    <td>
                        <a href="index.php?page=adm_edit_galeri&id=<?php echo $result['id_client']; ?>"
                        class="btn btn-warning">EDIT</a>
                        <a href="index.php?page=galeri&action=hapus&id=<?php echo $result['id_client']; ?>"
                        class="btn btn-danger">HAPUS</a>
                    </td>
                </tr>
                <?php
                $no++;
            }
        }
        ?>
    </table>
    </section>
</div>