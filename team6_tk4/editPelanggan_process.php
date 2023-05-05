<?php
include 'koneksidb.php';
$IdPelanggan = $_POST['IdPelanggan'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$Alamat = $_POST['Alamat'];
$NoHp = $_POST['NoHp'];
$query = "UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', Alamat='$Alamat', NoHp='$NoHp' WHERE IdPelanggan='$IdPelanggan'";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataPelanggan.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba simpan data ke database.";
    echo "<br><a href='dataPelanggan.php'>Kembali Ke Form</a>";
}
