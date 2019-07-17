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
    <title>Admin Area | Pages</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
<?php
    if(isset($_GET["Hapus"])){ ?>
    <script>
      alert('Data Berhasil Dihapus');
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Pembelian <small>| Pengaturan</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
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
          <li class="active">Pages</li>
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
                <h3 class="panel-title">Pages</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                     
                </div>
               
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Nama</th>
                        <th>Obat</th>
                        <th>Tanggal</th>
                        <th></th>
                      </tr><?php
                        $i = 0;
                        $query = mysqli_query($conn, "SELECT * FROM pembelian p, user u, obat b where u.id_user = p.id_user and p.id_obat = b.id_obat order by id_beli asc");
                        while ($m = mysqli_fetch_array($query)) {
                          $i++;
                      ?>
                      <tr>
                        <td><?php print $m['nama'] ?></td>
                        <td><?php print $m['nama_obat']?></td>
                        <td><?php print $m['tanggal_beli']?></td>
                        <td><a class="btn btn-danger" href="deletedb.php?idobat=<?php print $m['id_beli'] ?>">Delete</a></td>
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