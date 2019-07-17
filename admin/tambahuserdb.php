<?php
session_start();
include "../php/koneksi.php";

if(isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	mysqli_query($conn, "INSERT INTO USER (nama, alamat, email, username, password) values ('$nama', '$alamat', '$email', '$username', '$password')");
	header("location:pengguna.php?berhasil");
}
?>