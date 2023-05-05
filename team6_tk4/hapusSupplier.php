<?php
include 'koneksidb.php';
$IdSupplier = $_GET['IdSupplier'];
$query = "DELETE FROM supplier WHERE IdSupplier='$IdSupplier'";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataSupplier.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='dataSupplier.php'>Kembali Ke Form</a>";
}
