<?php
include_once("DBController.php");
$db_handle = new DBController();
$IdPembelian = $_GET['IdPembelian'];

if (!empty($IdPembelian)) {
    $query = "DELETE FROM pembelian_d WHERE `pembelian_d`.`IdPembelian` = '" . $_GET["IdPembelian"] . "'";
    $query2 = "DELETE FROM pembelian_h WHERE `pembelian_h`.`IdPembelian` = '" . $_GET["IdPembelian"] . "'";
    try {
        $result = $db_handle->deleteQuery($query);
        $result2 = $db_handle->deleteQuery($query2);
        if (!empty($result) && !empty($result2)) {
            header("Location:detailPembelian.php");
        } else {
            echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
            echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Internal Server Error')</script>";
        echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
    }
}