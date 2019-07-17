<?php
session_start();
include "../php/koneksi.php";

if(isset($_POST['submit'])) {
	$kategori = $_POST['kategori'];
	$nama = $_POST['nama_obat'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$admin = $_SESSION['nama'];
	$target_dir = "../img/";
	$namafile = basename($_FILES["gambar"]["name"]);
	$target_file = $target_dir . $namafile;
	if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {

	$query1 = mysqli_query($conn, "SELECT * from admin where useradmin = '$admin'");
	$n = mysqli_fetch_array($query1);
	$idadmin = $n['id_admin'];

	$query = mysqli_query($conn, "SELECT * from kategori where jenis_kategori = '$kategori'");
	$m = mysqli_fetch_array($query);
	$idkategori = $m['id_kategori'];

	mysqli_query($conn, "INSERT INTO obat (id_kategori, nama_obat, stok, foto, harga, id_admin) values('$idkategori', '$nama', '$stok','$namafile', '$harga', '$idadmin')");

	header("location:postingan.php");
}
}
?>