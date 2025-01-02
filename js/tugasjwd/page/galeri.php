<table class="table">
    <thead>
        <tr>
            <td>No.</td>
            <td>Nama Produk</td>
            <td>Ulasan</td>
            <td>Gambar Produk</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $sql = mysqli_query($koneksi, "SELECT * from galeri");
        if($sql){
            while($result=mysqli_fetch_array($sql)){?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $result['nama_produk']; ?></td>
                <td><?php echo $result['Ulasan']; ?></td>
                <td><img src="admin/gambar/<?php echo $result['gambar_produk']; ?>"></td>
            </tr>
            <?php   
            $no++;     
            }
        }
        ?>
        </tbody>
</table>