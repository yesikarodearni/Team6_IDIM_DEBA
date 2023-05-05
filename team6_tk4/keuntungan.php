<?php 

    //koneksi database
    $conn = mysqli_connect('localhost', 'root', '','team6_tk4');

    //baca ID tertinggi
    $sql_Id = mysqli_query($conn, "SELECT SUM(JumlahPembelian) FROM Penjualan");

    $data_Id = mysqli_fetch_array($sql_Id);
    
    $penjualan = $data_Id['SUM(JumlahPembelian)'];

?>
