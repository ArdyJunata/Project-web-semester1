<?php
include "koneksi.php";
session_start();

if(isset($_POST["login"])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

	$user = mysqli_fetch_array($query);
	$_SESSION["nama"] = $user['nama'];
	$_SESSION["alamat"] = $user['alamat'];
	$_SESSION["username"] = $user['username'];

	if(mysqli_num_rows($query) == 0) {
		header("location:../index.php?error");
	}
	else {
		$_SESSION["login"] = true;
		header("location:../main.php?berhasil");
	}
}
else {
	echo "oke";
}
?>