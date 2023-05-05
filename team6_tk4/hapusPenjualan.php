<?php
include_once("DBController.php");
$db_handle = new DBController();
$IdPenjualan = $_GET['IdPenjualan'];

if (!empty($IdPenjualan)) {
    $query = "DELETE FROM penjualan_d WHERE `penjualan_d`.`IdPenjualan` = '" . $_GET["IdPenjualan"] . "'";
    $query2 = "DELETE FROM penjualan_h WHERE `penjualan_h`.`IdPenjualan` = '" . $_GET["IdPenjualan"] . "'";
    try {
        $result = $db_handle->deleteQuery($query);
        $result2 = $db_handle->deleteQuery($query2);
        if (!empty($result) && !empty($result2)) {
            header("Location:detailPenjualan.php");
        } else {
            echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
            echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Internal Server Error')</script>";
        echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
    }
}
