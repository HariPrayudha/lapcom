<div class="col-g-12"><h3>Data Produk</h3></div>
<?php
    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk = '$id'");
            if($sql){
                echo 'produk berhasil dihapus';
            }else{
                echo 'produk gagal dihapus';
            }
        }
    }
?>
<div class="col-g-12">
    <section class="panel">
        <a href="index.php?page=adm_tambah_produk" class="btn btn-success">TAMBAH</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Gambar Produk</th>
            <th>Harga Produk</th>
            <th>Nama Produk</th>
            <th>Spek Produk</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM produk");
        $no=1;
        if($sql){
            while($result=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><img src="gambar/<?php echo $result['gambar']; ?>"></td>
                    <td><?php echo $result['harga']; ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['spek']; ?></td>
                    <td>
                        <a href="index.php?page=adm_edit_produk&id=<?php echo $result['id_produk']; ?>"
                        class="btn btn-warning">EDIT</a>
                        <a href="index.php?page=produk&action=hapus&id=<?php echo $result['id_produk']; ?>"
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