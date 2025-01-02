<table class="table">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama Client</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $sql = mysqli_query($koneksi, "SELECT * from client");
        if($sql){
            while($result=mysqli_fetch_array($sql)){?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $result['nama_client']; ?></td>
                <td><?php echo $result['jenis_kelamin']; ?></td>
                <td><?php echo $result['alamat']; ?></td>
                <td><?php echo $result['status']; ?></td>
            </tr>
            <?php   
            $no++;     
            }
        }
        ?>
        </tbody>
</table>