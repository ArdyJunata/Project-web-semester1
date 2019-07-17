<?php
session_start();
include "../php/koneksi.php";

$iduser = $_GET['iduser'];
	mysqli_query($conn, "DELETE from user where id_user = $iduser");
	header("location:pengguna.php?hapus")
	
?>