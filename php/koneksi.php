<?php
//buat koneksi MySQL untuk user : root, tanpa password, alamat 
$conn=mysqli_connect("localhost","root","","apotek");

//cek apakah koneksi dengan MySQL berhasil
if (mysqli_connect_errno($conn)) {
	//koneksi gagal
	echo "Koneksi dengan MySQL gagal : " . mysqli_connect_error();
}
else {
	//koneksi berhasil
	echo "  ";
}
?>