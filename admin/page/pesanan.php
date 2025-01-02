<div class="col-g-12"><h3>Data Pesanan</h3></div>
<?php
	require_once("config/koneksi.php");
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    }else{
    $email = '';
    header('location:index.php');
     };

    if(isset($_GET['action'])){
        if($_GET['action']=="hapus"){
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"DELETE FROM pesanan WHERE email = '$email'");
            if($sql){
                $message[] = 'Data Pesanan Berhasil Dihapus';
            }else{
                $message[] = 'Data Pesanan Gagal Dihapus';
            }
        }
    }

    if(isset($_POST['submit'])){
        $email = $_SESSION['email'];
        $newStatus = $_POST['status'];

        $sql = mysqli_query($koneksi, "UPDATE pesanan SET status = '$newStatus' WHERE email = '$email'");
        if($sql){
        $message[] = 'Status Berhasil Diupdate';
        } else {
        $message[] = 'Status Gagal Diupdate';
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
            <th>Nomor</th>
            <th>Email</th>
            <th>Metode Pembayaran</th>
            <th>Alamat</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Bukti Transfer</th>
            <th>Status Pesanan</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE email = '$email'");
        $no=1;
        if($sql){
            while($result=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $result['nama']; ?></td>
                    <td><?php echo $result['nomor']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['metode']; ?></td>
                    <td><?php echo $result['alamat'] . ' ' . $result['jalan'] . ' ' . $result['kota'] . ' ' . $result['provinsi'] . ' ' . $result['negara'] . ' ' . $result['kode_pos']; ?></td>
                    <td><?php echo $result['total_produk']; ?></td>
                    <td><?php echo $result['total_harga']; ?></td>
                    <td><img src="buktitf/<?php echo $result['bukti_tf']; ?>" width="200" height="200" onclick="openLightbox('buktitf/<?php echo $result['bukti_tf']; ?>')"></td>
                    <td>
                    <form method="post" action="">
                    <input type="hidden" name="status" value="<?php echo $result['status']; ?>">
                    <select name="status">
                        <option value="Verifikasi Pembayaran" <?php if($result['status'] == 'Verifikasi Pembayaran') echo 'selected'; ?>>Verifikasi Pembayaran</option>
                        <option value="Dikirim" <?php if($result['status'] == 'Dikirim') echo 'selected'; ?>>Dikirim</option>
                        <option value="Diterima" <?php if($result['status'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
                        <option value="Dibatalkan" <?php if($result['status'] == 'Dibatalkan') echo 'selected'; ?>>Dibatalkan</option>
                    </select>
                    </td>
                    <td>
                    <input type="submit" value="UPDATE STATUS" name="submit" class="btn btn-warning">
                    </form>    
                    <a href="index.php?page=pesanan&action=hapus&id=<?php echo $result['email']; ?>"
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

<div id="lightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <img id="lightboxImg" class="lightbox-content" src="" alt="Bukti Transfer">
</div>

<script>
    function openLightbox(imageSrc) {
        document.getElementById("lightboxImg").src = imageSrc;
        document.getElementById("lightbox").style.display = "block";
    }

    function closeLightbox() {
        document.getElementById("lightbox").style.display = "none";
    }
</script>
