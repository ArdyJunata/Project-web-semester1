<?php
  session_start();
  include "php/koneksi.php";  
  $nama_obat = $_GET['nama_obat'];
  $query = mysqli_query($conn, "SELECT * FROM obat WHERE nama_obat = '$nama_obat'");
  $m = mysqli_fetch_array($query);
  $_SESSION["harga"] = $m['harga'];
  $_SESSION["namaobat"] = $m['nama_obat'];
?>
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
    if(isset($_GET["berhasil"])){ ?>
    <script>
      alert('Berhasil Login');
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
        <a class="navbar-brand" href="#">Admin Dashboard</a>
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
        <div class="row">
          <div class="col-md-4">
            <div class="list-group">
              <a href="#" class="list-group-item disabled">
                Kategori Obat
              </a>
              <a href="main.php<?php $cek = 1?>" class="list-group-item">Pil <span class="badge">14</span></a>
              <a href="#" class="list-group-item">Sirup <span class="badge"></span></a>
              <a href="#" class="list-group-item">Bubuk <span class="badge">2</span></a>
              <a href="#" class="list-group-item">Kapsul <span class="badge">1</span></a>
            </div>
            <div class="list-group">
              <a href="#" class="list-group-item disabled">
                Kategori Obat
              </a>
              <a href="#" class="list-group-item">Pil <span class="badge">14</span></a>
              <a href="#" class="list-group-item">Sirup <span class="badge">2</span></a>
              <a href="#" class="list-group-item">Bubuk <span class="badge"></span></a>
              <a href="#" class="list-group-item">Kapsul <span class="badge">1</span></a>
              <a href="#" class="list-group-item">Bubuk <span class="badge"></span></a>
              <a href="#" class="list-group-item">Kapsul <span class="badge">3</span></a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row text-center">
                <div class="col-md-12">
                  <h3>Pesanan Anda</h3>
                  <hr>
                  <img src="img/upload/<?php print $m['foto'] ?>" width="200">
                </div>
            </div>
              <div class="col-md-12">
                <div class="col-md-2 col-md-offset-3">
                  <h4>Nama Obat</h4>
                </div>
                <div class="col-md-3">
                  <h4>: <input type="hidden" name="nama"><?php print $m['nama_obat']?></h4>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2 col-md-offset-3">
                  <h4>Harga</h4>
                </div>
                <div class="col-md-3">
                  <h4>: <input type="hidden" name="harga">Rp. <?php print $m['harga']?></h4>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2 col-md-offset-3">
                  <h4>Nama Penerima</h4>
                </div>
                <div class="col-md-6">
                  <h4><input type="hidden" class="form-control" name="username">: <?php print $_SESSION["nama"] ?></h4>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-2 col-md-offset-3">
                  <h4>Alamat Kirim</h4>
                </div>
                <div class="col-md-6">
                  <h4><input type="hidden" class="form-control" name="username">: <?php print $_SESSION["alamat"] ?></h4>
                </div>
              </div>
              <form action="php/pesanandb.php" method="POST">
              <div class="col-md-12">
                <div class="col-md-2 col-md-offset-3">
                  <h4>Jumlah Beli</h4>
                </div>
                <div class="col-md-5">
                  <h4><input type="number" class="form-control" name="jumlah"></h4>
                </div>
              </div>
              <div class="col-md-12 text-center" style="margin-top: 10px;">
                <p><button type="submit" name="submit" class="btn btn-primary">Beli</button></p>
              </div>
              </form>
            </div>
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