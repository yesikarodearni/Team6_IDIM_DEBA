<?php
include 'koneksidb.php';
$IdSupplier = $_POST['IdSupplier'];
$NamaSupplier = $_POST['NamaSupplier'];
$Alamat = $_POST['Alamat'];
$NoHp = $_POST['NoHp'];
$query = "UPDATE supplier SET NamaSupplier='$NamaSupplier', Alamat='$Alamat', NoHp='$NoHp' WHERE IdSupplier='$IdSupplier'";
$sql = mysqli_query($connect, $query);
if ($sql) {
    header("location: dataSupplier.php");
} else {
    echo "Maaf, Terjadi kesalahan saat mencoba simpan data ke database.";
    echo "<br><a href='dataSupplier.php'>Kembali Ke Form</a>";
}
