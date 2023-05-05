<?php
include 'koneksidb.php';
session_start();
$nama = $_SESSION['nama'];
$query1 = "SELECT IdPelanggan FROM Pelanggan";
$result1 = mysqli_query($connect, $query1);
$query2 = "SELECT IdBarang FROM Barang";
$result2 = mysqli_query($connect, $query2);
$query3 = "SELECT IdPengguna FROM Pengguna";
$result3 = mysqli_query($connect, $query3);
?>
<html>

<head>
    <title onclick="location.href = 'dashboard.php';">Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="center">
        <header class="menu">
            <figure class="user">
                <div class="user-avatar">
                    <img src="img/avatar.jpg">
                </div>
                <figcaption>
                    <?php echo $nama; ?>
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
            </header>
            <div class="content-3">
                <h2>Tambah Data Penjualan</h2>
                <section class="input">
                    <div class="box-input">
                        <div class="box2">
                            <form method="post" action="tambahPenjualan_process.php">
                                <table>
                                    <tr>
                                        <td>Id Penjualan</td>
                                        <td>
                                            <input type="text" name="IdPenjualan" class="kolom">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>
                                            <input type="date" name="Tanggal" class="kolom">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Id Pelanggan</td>
                                        <td>
                                            <select name="IdPelanggan" class="kolom">
                                                <?php
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($result1)) {
                                                    echo "<option value='" . $row['IdPelanggan'] . "'>" . $row['IdPelanggan'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Id Barang</td>
                                        <td>
                                            <select name="IdBarang" class="kolom">
                                            <?php
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($result2)) {
                                                    echo "<option value='" . $row['IdBarang'] . "'>" . $row['IdBarang'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Penjualan</td>
                                        <td>
                                            <input type="text" name="JumlahPenjualan" class="kolom">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Jual</td>
                                        <td>
                                            <input type="text" name="HargaJual" class="kolom">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Id Pengguna</td>
                                        <td>
                                            <select name="IdPengguna" class="kolom">
                                            <?php
                                                $no = 1;
                                                while ($row = mysqli_fetch_array($result3)) {
                                                    echo "<option value='" . $row['IdPengguna'] . "'>" . $row['IdPengguna'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" value="SIMPAN" class="simpan"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>

</html>