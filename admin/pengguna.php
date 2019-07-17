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
    <title>Admin Area | Users</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

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

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Pengguna <small>| Pengaturan</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <a href="tambahuser.php" class="btn btn-default dropdown-toggle" type="button">
                Tambah User</a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Users</li>
        </ol>
      </div>
    </section>

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
                <h3 class="panel-title">Postingan</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                </div>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>usr</th>
                        <th>Pw</th>
                        <th></th>
                      </tr><?php
                        $i = 0;
                        $query = mysqli_query($conn, "SELECT * FROM user order by id_user asc");
                        while ($m = mysqli_fetch_array($query)) {
                          $i++;
                      ?>
                      <tr>
                        <td><?php print $m['nama'] ?></td>
                        <td><?php print $m['alamat']?></td>
                        <td><?php print $m['email']?></td>
                        <td><?php print $m['username'] ?></td>
                        <td><?php print $m['password']?></td>
                        <td><a class="btn btn-default" href="editpengguna.php?iduser=<?php print $m['id_user'] ?>">Edit</a> <a class="btn btn-danger" href="deleteuser.php?iduser=<?php print $m['id_user'] ?>">Delete</a></td>
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
