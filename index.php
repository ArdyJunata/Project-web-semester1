<?php
      include "php/koneksi.php";
      session_start();

      if(isset($_SESSION["login"])) {
      header("location: main.php");
      }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Website</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php 
      if(isset($_GET['logout'])) {?>
        <script>
          alert('Anda Telah Logout');
        </script>
    <?php }
    ?>
    <div class="bg">
      <!-- MAIN -->
      <section class="main" id="main">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-12">
              <h1>Apotek Online Shop</h1>
              <h3>"Selamat Datang Di Website Ini, Mau Order ?"</h3>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary btn-lg" data-target="#myModal" data-toggle="modal">Masuk</button>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning btn-lg" data-target="#myModal2" data-toggle="modal">Daftar</button>
            </div>
          </div>
        </div>
      </section>
      <!-- END MAIN -->

      <!--Login -->
      <section class="login" id="login">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="container">
                <div class="col-md-12 text-center">
                  <div class="g">
                    <h2>Halaman Masuk</h2>
                    <p>Beli Obat Tanpa Batas</p>
                    <form action="php/login.php" class="login" method="POST">
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                      </div>
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
                        </span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                      </div>
                      <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                    <?php
                          if(isset($_GET["error"])){ ?>
                            <script>
                              alert('Username / Password Salah');
                            </script>
                        <?php 
                          } 
                    ?>
                    <p class="h">Belum Punya Akun ? Klik <a href="#" data-target="#myModal2" data-toggle="modal">Daftar</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- END Login-->

      <!-- Daftar -->
      <section class="daftar" id="daftar">
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="container">
                <div class="col-md-12 text-center">
                  <div class="g">
                    <h2>Form Daftar</h2>
                    <p>Daftar dulu baru bisa order sist..</p>
                    <form action="php/register.php" class="login" method="POST">
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                      </div>
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                      </div>
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                      </div>
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                      <div class="input-group h">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock" aria-hidden="true"></i>
                        </span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                    </form>
                    <?php
                          if(isset($_GET["berhasildaftar"])){ ?>
                          <script>
                            alert('Selamat ! Anda Telah membuat akun, Silahkan Login')
                          </script>
                        <?php 
                          } 
                    ?>
                    <p class="h">Ingat Username dan Passwordnya ya untuk Masuk</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- END Daftar -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>