<?php
session_start();
include "../php/koneksi.php";

$idobat = $_GET['idobat'];
	mysqli_query($conn, "DELETE from obat where id_obat = $idobat");
	header("location:postingan.php?hapus")
	
?>