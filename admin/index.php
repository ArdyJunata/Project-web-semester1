<?php 
session_start();
include "../php/koneksi.php";
$query = mysqli_query($conn, "SELECT count(id_user) jumlah from user");
$m = mysqli_fetch_array($query);
$query = mysqli_query($conn, "SELECT count(id_beli) jumlahbeli from pembelian");
$n = mysqli_fetch_array($query);
$query = mysqli_query($conn, "SELECT count(id_obat) jumlahobat from obat");
$o = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <?php
      if(!isset($_SESSION["login"])) {
      header("location: login.php");
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
          <a href="logout.php" class="btn btn-primary">Logout</a>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="#">Hello, <?php print $_SESSION['nama'] ?></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="pembelian.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pembelian <span class="badge"><?php print $n['jumlahbeli'];?></span></a>
              <a href="postingan.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Postingan <span class="badge"><?php print $o['jumlahobat'];?></span></a>
              <a href="pengguna.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pengguna <span class="badge"><?php print $m['jumlah'];?></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php print $m['jumlah'];?></h2>
                    <h4>Pengguna</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php print $n['jumlahbeli'];?></h2>
                    <h4>Pembelian</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php print $o['jumlahobat'];?></h2>
                    <h4>Postingan</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest pembelian -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Pembelian Terkahir</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Obat</th>
                        <th>Tanggal</th>
                      </tr>
                      <?php
                        $i = 0;
                        $query = mysqli_query($conn, "SELECT * FROM pembelian p, user u, obat b where u.id_user = p.id_user and p.id_obat = b.id_obat order by id_beli asc");
                        while ($m = mysqli_fetch_array($query)) {
                          $i++;
                      ?>
                      <tr>
                        <td><?php print $m['nama'] ?></td>
                        <td><?php print $m['nama_obat']?></td>
                        <td><?php print $m['tanggal_beli']?></td>
                      </tr>
                    <?php } ?>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
