<div class="col-g-12"><h3>Data Pelanggan</h3></div>
<?php
require_once("config/koneksi.php");

    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"DELETE FROM pelanggan WHERE email = '$id'");
            if($sql){
                $message[] = 'Data Pelanggan Berhasil Dihapus';
            }else{
                $message[] = 'Data Pelanggan Gagal Dihapus';
            }
        }
    }

    if(isset($message)){
        foreach($message as $message){
           echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
      };
    
?>
<div class="col-g-12">
    <section class="panel">
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        $no=1;
        if($sql){
            while($result=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['no_telp']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['alamat']; ?></td>
                    <td>
                    <a href="index.php?page=pelanggan&action=hapus&id=<?php echo $result['email']; ?>"
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