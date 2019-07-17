<?php
include "../php/koneksi.php";
session_start();

if(isset($_POST["login"])) {

	$username = $_POST['useradmin'];
	$password = $_POST['password'];

	$query = mysqli_query($conn, "SELECT * FROM admin WHERE useradmin = '$username' AND pass = '$password'");

	$user = mysqli_fetch_array($query);
	$_SESSION["nama"] = $user['useradmin'];

	if(mysqli_num_rows($query) == 0) {
		header("location:login.php?error");
	}
	else {
		$_SESSION["login"] = true;
		header("location:index.php?berhasil");
	}
}
else {
	echo "oke";
}
?>