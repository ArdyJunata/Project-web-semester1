<?php
session_start();
include "../php/koneksi.php";

if(isset($_POST['submit'])) {
	$idobat = $_POST['idobat'];
	$namaobat = $_POST['namaobat'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];

	mysqli_query($conn, "UPDATE obat SET nama_obat = '$namaobat', harga = '$harga', stok = '$stok' where id_obat = '$idobat'");
	header("location:postingan.php?hapus");
}
else {
	echo "oke";
}
?>