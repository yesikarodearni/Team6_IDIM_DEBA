<?php
include 'koneksidb.php';
$IdPenjualan = $_POST['IdPenjualan'];
$Tanggal = $_POST['Tanggal'];
$IdPelanggan = $_POST['IdPelanggan'];
$IdBarang = $_POST['IdBarang'];
$JumlahPenjualan = $_POST['JumlahPenjualan'];
$HargaJual = $_POST['HargaJual'];
$IdPengguna = $_POST['IdPengguna'];

$query1 = "INSERT INTO penjualan_h (IdPenjualan, Tanggal, IdPelanggan, IdPengguna) VALUES ('$IdPenjualan', '$Tanggal', '$IdPelanggan', '$IdPengguna')";
$query2 = "INSERT INTO penjualan_d (IdPenjualan, IdBarang, JumlahPenjualan, HargaJual, IdPengguna) VALUES ('$IdPenjualan', '$IdBarang', '$JumlahPenjualan', '$HargaJual', '$IdPengguna')";
$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);



