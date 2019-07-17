<?php
session_start();
include "../php/koneksi.php";

if(isset($_POST['submit'])) {
	$iduser = $_POST['iduser'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	mysqli_query($conn, "UPDATE user SET nama = '$nama', alamat = '$alamat', email = '$email', username = '$user', password = '$pass' where id_user = '$iduser'");
	header("location:pengguna.php?hapus");
}
else {
	echo "oke";
}
?>