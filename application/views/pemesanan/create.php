<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tahu Crispy</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>/assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>/assets/user/css/shop-homepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo site_url('Awal') ?>">Tahu Susu Crispy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo site_url('awal') ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Login') ?>">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h2 class="my-4">Tahu Susu Crispy</h2>
          <div class="list-group">
            <a href="<?php echo site_url('Awal') ?>" class="list-group-item">Produk</a>
            <a href="<?php echo site_url('Awal/kontak') ?>" class="list-group-item">Kontak</a>
            <!-- <a href="<?php echo site_url('kategori/karikatur_polos') ?>" class="list-group-item">Karikatur Polos</a>
            <a href="<?php echo site_url('kategori/karikatur_custom') ?>" class="list-group-item">Karikatur Custom</a> -->
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <div class="row">
            <br><br><br>
          </div>
          <!-- <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/slide/botol1.png" alt="First slide" height="300px">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/slide/botol2.jpg" alt="Second slide" width="900px">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url() ?>/assets/slide/botol3.png" alt="Third slide" height="300px">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div> -->

          <div class="row">
            <legend>Form Pemesanan Tahu Susu Crispy</legend>
            <?php echo form_open('Pemesanan/index/'.$this->uri->segment(3)); ?>
            <?php echo validation_errors(); ?>
              <div class="form-group">
                <label for="">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" class="form-control" id="" placeholder="Nama Pelanggan">

                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="" placeholder="Alamat">

                <label for="">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" id="" placeholder="Nomor HP">

                <label for="">Jumlah Pesanan</label>
                <input type="text" name="jumlah_pesanan" class="form-control" id="" placeholder="Jumlah Pesanan">

                <label for="">Pilihan Pengiriman</label>
                <select name="pengiriman" id="inputPengiriman" class="form-control">
                  <option value="Diambil">Diambil</option>
                  <option value="Dikirim">Dikirim</option>
                </select>

                <label for="">Lokasi</label>
                <select name="lokasi" id="inputLokasi" class="form-control">
                  <option value="-">--- Pilih Lokasi Jika Dikirim ---</option>
                  <option value="11000">Sukun</option>
                  <option value="15000">Tajinan</option>
                  <option value="16000">Tumpang</option>
                  <option value="5000">Lowokwaru</option>
                </select>

                <label for="">Pilihan Pembayaran</label>
                <select name="pilihan_pembayaran" id="inputLokasi" class="form-control">
                  <option value="-">--- Pilihan Pembayaran ---</option>
                  <option value="Transfer">Transfer</option>
                  <option value="Ditempat">Ditempat</option>
                </select>

                <label for="">Tanggal Kirim</label>
                <input type="date" name="tanggal_kirim" class="form-control" id="">

                
              </div>
            
              
            
              <button type="submit" class="btn btn-primary">Submit</button>
            <?php echo form_close(); ?>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <br><br><br><br>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Aliffandi & Khamdan 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>/assets/user/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
