<?php
try {

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "team6_tk4";

    $connect = mysqli_connect($server, $user, $pass, $db);

    if (!$connect) {
        die("Connection Failed : " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}
?>