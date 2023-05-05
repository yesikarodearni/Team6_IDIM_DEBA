<?php
include 'koneksidb.php';
$IdBarang = $_POST['IdBarang'];
$NamaBarang = $_POST['NamaBarang'];
$Keterangan = $_POST['Keterangan'];
$Satuan = $_POST['Satuan'];
$IdPengguna = $_POST['IdPengguna'];
$query = "INSERT INTO barang (IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('$IdBarang', '$NamaBarang', '$Keterangan', '$Satuan', '$IdPengguna')";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataBarang.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba simpan data ke database.";
    echo "<br><a href='dataBarang.php'>Kembali Ke Form</a>";
}
