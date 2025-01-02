<?php

	require_once("config/koneksi.php");

  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql = mysqli_query($koneksi, "INSERT INTO `pesan`(nama, email, pesan)
    VALUES('$nama', '$email', '$pesan')");
	  if($sql){
	  $message[] = 'Pesan Terkirim';
	  } else {
	  $message[] = 'Pesan Gagal Terkirim';
	  }
  }
  if(isset($message)){
    foreach($message as $message){
       echo '<div class="message"><span>'.$message.'</span> <i class="fa fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
  };
?>

<div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h2 align="center">Kontak Kami</h2>
                 </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="contact-us">
      <div class="container">
        <div class="row">
        
          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">
                <div class="col-lg-8">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>Kirim Pesan</h2>
                    </div>
                    <div class="content">
                      <form id="contact" action="" method="post">
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="nama" type="text" id="nama" placeholder="Nama Kamu" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Email Kamu" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="pesan" type="text" rows="6" id="pesan" placeholder="Pesan dan Saran" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                            <input type="submit" value="Kirim Pesan" name="submit" class="btn btn-primary">
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="sidebar-item contact-information">
                    <div class="sidebar-heading">
                      <h2>Info Kontak</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <h5>+62812-6694-3205</h5>
                          <span>NOMOR TELEPON</span>
                        </li>
                        <li>
                          <h5>lapcom@gmail.com</h5>
                          <span>EMAIL</span>
                        </li>
                        <li>
                          <h5>Jl. Lap Golf Tuntungan</h5>
                          <span>JALAN</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4031756292948!2d98.5877654!3d3.4937205999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303125197f331eeb%3A0x1c418b38fc4ea5e!2sUINSU%20Medan%20Tuntungan%20Kampus%20IV!5e0!3m2!1sid!2sid!4v1700835386762!5m2!1sid!2sid" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          
        </div>
      </div>
    </section>