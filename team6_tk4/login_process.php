<?php
include_once("DBController.php");
$db_handle = new DBController();
$idpengguna = $_POST['idpengguna'];
$password = $_POST['password'];
$idakses = $_POST['idakses'];


if (empty($idpengguna)) {
    echo "<script>alert('Id Pengguna belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else if (empty($password)) {
    echo "<script>alert('Password belum diisi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {
    $query = "SELECT * FROM pengguna JOIN hakakses WHERE IdPengguna ='$idpengguna' and Password ='$password'";
    $result = $db_handle->runQuery($query);

    if (empty($result)) {
        echo "<script>alert('Id Pengguna atau Password salah')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    } else {
        session_start();
        $_SESSION['id'] = $idpengguna;
        header("Location:dashboard.php");
    }
}
