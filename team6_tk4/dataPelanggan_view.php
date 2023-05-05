<?php
include "koneksidb.php";
session_start();
$nama = $_SESSION['nama'];
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($connect, $query);
?>
<html>

<head>
    <title onclick="location.href = 'dashboard_view.php';">Dashboard</title>
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
                            <a href="dataBarang_view.php">
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
                            <a href="dataPelanggan_view.php">
                                <i class="fas fa-user"></i>
                                Daftar Pelanggan
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="dataPenjualan_view.php">
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
                            <a href="dataSupplier_view.php">
                                <i class="fas fa-store"></i>
                                Daftar Supplier
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="dataPembelian_view.php">
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

            <div class="container">
                <h2>Data Pelanggan</h2>
                    <div class="box-3">
                            <table class="content-table2">
                                <tr>
                                    <th>No</th>
                                    <th>Id Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>IdPengguna</th>
                                </tr>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['IdPelanggan']; ?></td>
                                        <td><?php echo $row['NamaPelanggan']; ?></td>
                                        <td><?php echo $row['Alamat']; ?></td>
                                        <td><?php echo $row['NoHp']; ?></td>
                                        <td><?php echo $row['IdPengguna']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                    </div>
            </div>
        </main>
    </div>
</body>

</html>