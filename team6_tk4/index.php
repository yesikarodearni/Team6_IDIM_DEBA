<?php
    include "koneksidb.php";
    session_start();
    if (!isset($_SESSION['idpengguna'])){
        header ("location:login.php");
    }

        $query = mysqli_query($connect, "SELECT IdPengguna, IdAkses, Keterangan FROM pengguna JOIN hakakses USING (IdAkses) WHERE IdPengguna = '$idpengguna'");
        $p = mysqli_fetch_array($query);
        $Keterangan = $p['Keterangan'];
        if($Keterangan=='Admin'){
            echo "<meta http-equiv='refresh' content='0 url=dashboard.php'>";
        }else if($Keterangan=='User'){
            echo "<meta http-equiv='refresh' content='0 url=dashboard_view.php'>";
        }
    ?>
