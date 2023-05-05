<?php
include 'koneksidb.php';
$IdPembelian = $_POST['IdPembelian'];
$JumlahPembelian = $_POST['JumlahPembelian'];
$HargaBeli = $_POST['HargaBeli'];
$IdBarang = $_POST['IdBarang'];
$IdPengguna = $_POST['IdPengguna'];
$query = "INSERT INTO pembelian (IdPembelian, JumlahPembelian, HargaBeli, IdBarang, IdPengguna) VALUES ('$IdPembelian', '$JumlahPembelian', '$HargaBeli', '$IdBarang', '$IdPengguna')";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataPembelian.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba simpan data ke database.";
    echo "<br><a href='dataPembelian.php'>Kembali Ke Form</a>";
}
