<?php
session_start();
include "../php/koneksi.php";

$idobat = $_GET['idobat'];
	mysqli_query($conn, "DELETE from pembelian where id_beli = $idobat");
	header("location:pembelian.php?hapus")
	
?>