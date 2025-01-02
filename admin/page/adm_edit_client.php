<?php
    if(isset($_POST['edit_client'])){
        $id_client = $_POST['id_client'];
        $nama_client = $_POST['nama_client'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat']; 
        $status = $_POST['status'];
        if(empty($id_client) || empty($nama_client) || empty($jenis_kelamin) || empty($alamat) ||  empty($status)){
            echo '<div class="warning"> Data tidak boleh kosong</div>';
        }else{
            $edit = mysqli_query($koneksi, "UPDATE client
            SET nama_client='$nama_client', jenis_kelamin='$jenis_kelamin', alamat='$alamat', status='$status'
            WHERE id_client='$id_client'");
            if($edit){
                echo '<div class="success">Client Berhasil diedit</div>';
            }else{
                echo '<div class="error">Client Gagal diedit</div>';
        }
        }
    }

$id_client = $_GET['id'];
$sql = mysqli_query($koneksi,"SELECT * FROM client WHERE id_client = '$id_client'");
$result = mysqli_fetch_array($sql);
?>
<div class="col-lg-6">
    <section class="panel">
        <form method="post" action="">
            <fieldset style="border: 1px solid orange;">
            <legend>Edit Client</legend>
            <input type="hidden"name="id_client" placehorder="Id client" class="form-control" value="<?php echo $result['id_client'];?>"><br>
            <legend>Nama client</legend>
            <input type="text"name="nama_client" placehorder="Nama client" class="form-control"value="<?php echo $result['nama_client'];?>"><br>
            <select name="jenis_kelamin" class="form-control">
                <option value="laki_laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
            <legend>Alamat</legend>
            <input type="text"name="alamat" placehorder="Alamat" class="form-control"value="<?php echo $result['alamat'];?>"><br>
            <select name="status" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="cuti">Cuti</option>
            </select><br>
            <input class="btn btn-info" type="submit" name="edit_client" value="Edit client" class="sumbit">
            </fieldset>
        </form>
    </section>
</div>