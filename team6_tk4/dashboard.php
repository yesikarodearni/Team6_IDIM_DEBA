<?php
include_once("DBController.php");

session_start();
$db_handle = new DBController();

$dataPoints = array();
$idpengguna = $_SESSION['id'];
if (!isset($idpengguna)) {
    header('location:login.php');
}

$query = "SELECT NamaPengguna FROM pengguna WHERE IdPengguna ='$idpengguna'";
try {
    $result = $db_handle->runQuery($query);
    if (!empty($result)) {
        foreach ($result as $key => $value) {
            $namaPengguna =  $value['NamaPengguna'];
            $_SESSION['nama'] = $namaPengguna;
        }
    }
} catch (Exception $e) {
    echo "<script>alert('Internal Server Error')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}


$query =
    "SELECT
    IdBarang,
    NamaBarang,
    SUM(
        penjualan_d.HargaJual - pembelian_d.HargaBeli
    ) AS KeuntunganPenjua1an,
    (penjualan_d.HargaJual - Satuan) AS KeuntunganSetiapBarang,
    SUM(
        pembelian_d.JumlahPembelian - penjualan_d.JumlahPenjualan
    ) AS Stok,
    SUM(penjualan_d.JumlahPenjualan) AS JumlahPenjualan
FROM
    barang
JOIN pembelian_d USING(IdBarang)
JOIN penjualan_d USING(IdBarang)
GROUP BY
    (IdBarang)";

try {
    $value = $db_handle->runQuery($query);
    $no = 1;
    if (!empty($value)) {
        foreach ($value as $key => $row) {
            array_push($dataPoints, array("label" =>  $row['NamaBarang'], "y" => $row['KeuntunganSetiapBarang']));
        }
    }
?>
    <html>

    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Keuntungan Penjualan"
                },
                axisY: {
                    title: "Keuntungan Penjualan per Barang (IDR)"
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc  
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            var pieChart = new CanvasJS.Chart("pieChartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Ratio Penjualan per Barang"
                },
                axisY: {
                    title: "Ratio Penjualan"
                },
                data: [{
                    type: "pie", //change type to bar, line, area, pie, etc  
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            pieChart.render();
        }
    </script>

    <body>
        <div class="center">
            <header class="menu">
                <figure class="user">
                    <div class="user-avatar">
                        <a href="index.php">
                            <img src="img/avatar.jpg">
                        </a>
                    </div>
                    <figcaption>
                        <?php echo $namaPengguna; ?>
                    </figcaption>
                </figure>
                <nav>
                    <section class="barang">
                        <h3>Barang</h3>
                        <ul>
                            <li>
                                <a href="dataBarang.php">
                                    <i class="fas fa-tag"></i>
                                    Daftar Barang
                                </a>
                            </li>
                        </ul>
                    </section>
                    <section class="penjualan">
                        <h3>Penjualan</h3>

                        <ul>
                            <li>
                                <a href="dataPelanggan.php">
                                    <i class="fas fa-user"></i>
                                    Daftar Pelanggan
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="dataPenjualan.php">
                                    <i class="fas fa-cash-register"></i>
                                    Daftar Penjualan
                                </a>
                            </li>
                        </ul>
                    </section>
                    <section class="penjualan">
                        <h3>Pembelian</h3>
                        <ul>
                            <li>
                                <a href="dataSupplier.php">
                                    <i class="fas fa-store"></i>
                                    Daftar Supplier
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="dataPembelian.php">
                                    <i class="fas fa-receipt"></i>
                                    Daftar Pembelian
                                </a>
                            </li>
                        </ul>
                    </section>
                </nav>
            </header>

            <main class="content-wrap">
                <header class="content-head">
                    <h1>Dashboard</h1>
                    <div class="action">
                        <button onclick="location.href = 'logout.php';">
                            Sign out
                        </button>
                    </div>
                </header>
                <div class="content">
                    <section class="content-1">
                            <div class="chart" id="chartContainer" style="height: 300px; width: 450px"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                            <div class="chart" id="pieChartContainer" style="height: 300px; width: 350px"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </section>
                </div>
            </main>
        </div>
    </body>

    </html>
<?php
} catch (Exception $e) {
    echo "<script>alert('Internal Server Error')</script>";
    echo "<meta http-equiv='refresh' content='0; url=dataBarang.php'>";
}
