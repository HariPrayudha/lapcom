<div class="col-g-12"><h3>Data Client</h3></div>
<?php
    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"DELETE FROM client WHERE id_client = '$id'");
            if($sql){
                echo 'Anggota berhasil dihapus';
            }else{
                echo 'Anggota gagal dihapus';
            }
        }
    }
?>
<div class="col-g-12">
    <section class="panel">
        <a href="index.php?page=adm_tambah_client" class="btn btn-success">TAMBAH</a>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Client</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM client");
        $no=1;
        if($sql){
            while($result=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $result['nama_client']; ?></td>
                    <td><?php echo $result['jenis_kelamin']; ?></td>
                    <td><?php echo $result['alamat']; ?></td>
                    <td>
                        <a href="index.php?page=adm_edit_client&id=<?php echo $result['id_client']; ?>"
                        class="btn btn-info">EDIT</a>
                        <a href="index.php?page=client&action=hapus&id=<?php echo $result['id_client']; ?>"
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