<?php
include 'koneksidb.php';
$IdPelanggan = $_GET['IdPelanggan'];
$query = "DELETE FROM pelanggan WHERE IdPelanggan='$IdPelanggan'";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataPelanggan.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='dataPelanggan.php'>Kembali Ke Form</a>";
}
