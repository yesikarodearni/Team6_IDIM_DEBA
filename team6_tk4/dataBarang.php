<!-- show data as table from mysql and make a html like dashboard.php -->
<?php
include_once("DBController.php");

session_start();
$db_handle = new DBController();

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
if (!isset($id)) {
    header('location:login.php');
}

$query = "SELECT * FROM barang";
try {
    $value = $db_handle->runQuery($query);
    $no = 1;
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
                    <div class="action">
                        <button onclick="location.href = 'logout.php';">
                            Sign out
                        </button>
                    </div>
                </header>

                <div class="container">
                    <h2>Daftar Barang</h2>
                    <div class="box-2">
                        <table class="content-table">
                            <tr>
                                <th>No</th>
                                <th>Id Barang</th>
                                <th>Nama Barang</th>
                                <th>Keterangan</th>
                                <th>Satuan</th>
                                <th>Pengaturan</th>
                            </tr>
                            <?php
                            foreach ($value as $key => $value) {
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $value['IdBarang']; ?></td>
                                    <td><?php echo $value['NamaBarang']; ?></td>
                                    <td><?php echo $value['Keterangan']; ?></td>
                                    <td><?php echo $value['Satuan']; ?></td>
                                    <td>
                                        <a class="edit" href="editBarang.php?IdBarang=<?php echo $value['IdBarang']; ?>&IdPengguna=<?php echo $value['IdPengguna']; ?>">Edit</a>
                                        <a class="delete" href="hapusBarang.php?IdBarang=<?php echo $value['IdBarang']; ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div class="action2">
                        <button onclick="location.href = 'tambahBarang.php';">
                            +Tambah Barang
                        </button>
                    </div>
                </div>
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
