<?php 
session_start();
include "koneksi.php";
if(isset($_POST['submit'])) {

	$jumlah = $_POST['jumlah'];

	$query = mysqli_query($conn, "SELECT * FROM pembelian");
  	$m = mysqli_fetch_array($query);
  	$username = $_SESSION['username'];
  	$query = mysqli_query($conn, "SELECT * FROM user where username = '$username'");
  	$n = mysqli_fetch_array($query);
  	$namaobat = $_SESSION['namaobat'];
  	$query = mysqli_query($conn, "SELECT * FROM obat where nama_obat = '$namaobat'");
  	$o = mysqli_fetch_array($query);
  	$idobat = $o['id_obat'];
  	$iduser = $n['id_user'];

	$total = $_SESSION['harga']*$jumlah;
	$tanggal = date("Y-m-d H:i:s");

	mysqli_query($conn, "INSERT INTO pembelian (id_user, id_obat, jumlah_beli, total_bayar, tanggal_beli) values('$iduser', '$idobat', '$jumlah', '$total', '$tanggal')");

	header("location:../main.php?pesan");
}
?>