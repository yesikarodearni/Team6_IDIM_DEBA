<!-- use delete method to delete barang from idbarang using DBController.php -->
<?php
include_once("DBController.php");
$db_handle = new DBController();
if (!empty($_GET["IdBarang"])) {
    $query = "DELETE FROM barang WHERE IdBarang='" . $_GET["IdBarang"] . "'";
    try {
        $result = $db_handle->deleteQuery($query);
        if (!empty($result)) {
            header("Location:dataBarang.php");
        } else {
            echo "<script>alert('Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.')</script>";
            echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Internal Server Error')</script>";
        echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
    }
}
