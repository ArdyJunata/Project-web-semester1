<?php 
include "koneksi.php";
if(isset($_POST["daftar"])) {

	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	mysqli_query($conn, "INSERT INTO USER (nama, alamat, email, username, password) values ('$nama', '$alamat', '$email', '$username', '$password')");
	header("location:../index.php?berhasildaftar");	
}

?>