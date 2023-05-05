<?php
include 'koneksidb.php';
$IdPembelian = $_POST['IdPembelian'];
$JumlahPembelian = $_POST['JumlahPembelian'];
$HargaBeli = $_POST['HargaBeli'];
$IdPengguna = $_POST['IdPengguna'];
$IdBarang = $_POST['IdBarang'];
$query = "UPDATE pembelian SET JumlahPembelian='$JumlahPembelian', HargaBeli='$HargaBeli', IdPengguna='$IdPengguna', IdBarang='$IdBarang' WHERE IdPembelian='$IdPembelian'";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataPembelian.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba simpan data ke database.";
    echo "<br><a href='dataPembelian.php'>Kembali Ke Form</a>";
}
