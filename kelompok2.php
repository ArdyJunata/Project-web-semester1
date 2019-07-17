<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php
      include "php/koneksi.php";
      session_start();

      if(!isset($_SESSION["login"])) {
      header("location: index.php");
      }
      $query = mysqli_query($conn, "SELECT count(id_kategori) jumlah from obat where id_kategori = 3001");
      $m = mysqli_fetch_array($query);
      $query = mysqli_query($conn, "SELECT count(id_kategori) jumlah from obat where id_kategori = 3002");
      $n = mysqli_fetch_array($query);
      $query = mysqli_query($conn, "SELECT count(id_kategori) jumlah from obat where id_kategori = 3003");
      $o = mysqli_fetch_array($query);
      $query = mysqli_query($conn, "SELECT count(id_kategori) jumlah from obat where id_kategori = 3004");
      $p = mysqli_fetch_array($query);

    ?>
  <?php
    if(isset($_GET["berhasil"])){ ?>
    <script>
      alert('Berhasil Login');
    </script>
  <?php 
      } 
  ?>
  <?php
    if(isset($_GET["pesan"])){ ?>
    <script>
      alert('Terima Kasih Telah Memesan, Pesanan Anda Akan Segera Dikirim Ke alamat Tujuan');
    </script>
  <?php 
      } 
  ?>  
  <!-- NAVBAR -->
  <nav class="apotek-navbar navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Apotek</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <form class="navbar-form navbar-right">
          <a href="php/logout.php" class="btn btn-primary">Logout</a>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="main.php">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#"><?php print $_SESSION["nama"] ?></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

  <!-- Slide Images -->
  <section class="slider" id="slider">
    <div class="container">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="img/slider-1.jpg" alt="Lorem ipsum dolor sit amet.">
          </div>
          <div class="item">
            <img src="img/slider-2.jpg" alt="Lorem ipsum dolor sit amet.">
          </div>
          <div class="item">
            <img src="img/slider-3.jpg" alt="Lorem ipsum dolor sit amet.">
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </section>
  <!-- End Slide Images -->

  <!-- Content -->
  <section class="content" id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>Apotek Online</h2>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <div class="list-group">
              <a href="#" class="list-group-item disabled">
                Kategori Obat
              </a>
              <a href="kelompok1.php" class="list-group-item">Pil <span class="badge"><?php print $m['jumlah'];?></span></a>
              <a href="kelompok2.php" class="list-group-item">Kapsul <span class="badge"><?php print $n['jumlah'];?></span></a>
              <a href="kelompok3.php" class="list-group-item">Sirup <span class="badge"><?php print $o['jumlah'];?></span></a>
              <a href="kelompok4.php" class="list-group-item">Bubuk <span class="badge"><?php print $p['jumlah'];?></span></a>
            </div>
          </div>
          <div class="col-md-8 text-center">
            <div class="row">
              <?php
                $i = 0;
                $query = mysqli_query($conn, "SELECT * FROM obat where id_kategori = 3002 order by id_obat");
                while ($m = mysqli_fetch_array($query)) {
                  $i++;
              ?>
              <form action="pesanan.php?nama_obat=<?=$m['nama_obat'] ?>" method="POST">
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="img/upload/<?php print $m['foto']?>" alt="...">
                    <div class="caption">
                      <h3><?php print $m['nama_obat'] ?></h3>
                      <p>Rp. <?php print $m['harga'] ?></p>
                      <button type="submit" class="btn btn-primary">Beli</button>
                    </div>
                  </div>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Content -->

  <!-- Footer -->
  <section class="footer" id="footer">
    <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <p>&copy; 2018 | built by. <a href="http://instagram.com/ardyjunata">Muhammad Ardy Junata.</a></p>
          </div>
        </div>
      </div> <!-- container -->
  </section>
  <!-- End Footer -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>