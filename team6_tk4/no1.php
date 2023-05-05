<?php
class HakAkses
{
    public $IdAkses;
    public $NamaAkses;
    public $Keterangan;

    public function getData($IdAkses)
    {
        $sql = "SELECT * FROM HakAkses WHERE IdAkses = '$IdAkses'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $this->IdAkses = $row['IdAkses'];
        $this->NamaAkses = $row['NamaAkses'];
        $this->Keterangan = $row['Keterangan'];
    }

    public function saveData()
    {
        $sql = "INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) VALUES ('$this->IdAkses', '$this->NamaAkses', '$this->Keterangan')";
        mysqli_query($conn, $sql);
    }

    public function deleteData($IdAkses)
    {
        $sql = "DELETE FROM HakAkses WHERE IdAkses = '$IdAkses'";
        mysqli_query($conn, $sql);
    }
}
?>

<?php
class Pengguna
{
    public $IdPengguna;
    public $Password;
    public $NamaDepan;
    public $NamaBelakang;
    public $NoHP;
    public $Alamat;
    public $IdAkses;

    public function getData($IdPengguna)
    {
        $sql = "SELECT * FROM Pengguna WHERE IdPengguna = '$IdPengguna'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $this->IdPengguna = $row['IdPengguna'];
        $this->Password = $row['Password'];
        $this->NamaDepan = $row['NamaDepan'];
        $this->NamaBelakang = $row['NamaBelakang'];
        $this->NoHP = $row['NoHP'];
        $this->Alamat = $row['Alamat'];
        $this->IdAkses = $row['IdAkses'];
    }

    public function saveData()
    {
        $sql = "INSERT INTO Pengguna (IdPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES ('$this->IdPengguna', '$this->Password', '$this->NamaDepan', '$this->NamaBelakang', '$this->NoHP', '$this->Alamat', '$this->IdAkses')";
        mysqli_query($conn, $sql);
    }

    public function updateData($IdPengguna)
    {
        $sql = "UPDATE Pengguna SET Password = '$this->Password', NamaDepan = '$this->NamaDepan', NamaBelakang = '$this->NamaBelakang', NoHP = '$this->NoHP', Alamat = '$this->Alamat', IdAkses = '$this->IdAkses' WHERE IdPengguna = '$IdPengguna'";
        mysqli_query($conn, $sql);
    }

    public function deleteData($IdPengguna)
    {
        $sql = "DELETE FROM Pengguna WHERE IdPengguna = '$IdPengguna'";
        mysqli_query($conn, $sql);
    }
}
?>

<?php
class Barang
{
    public $IdBarang;
    public $NamaBarang;
    public $Keterangan;
    public $Satuan;
    public $IdPengguna;

    public function getData($IdBarang)
    {
        $sql = "SELECT * FROM Barang WHERE IdBarang = '$IdBarang'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $this->IdBarang = $row['IdBarang'];
        $this->NamaBarang = $row['NamaBarang'];
        $this->Keterangan = $row['Keterangan'];
        $this->Satuan = $row['Satuan'];
        $this->IdPengguna = $row['IdPengguna'];
    }

    public function saveData()
    {
        $sql = "INSERT INTO Barang (IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna) VALUES ('$this->IdBarang', '$this->NamaBarang', '$this->Keterangan', '$this->Satuan', '$this->IdPengguna')";
        mysqli_query($conn, $sql);
    }

    public function updateData($IdBarang)
    {
        $sql = "UPDATE Barang SET NamaBarang = '$this->NamaBarang', Keterangan = '$this->Keterangan', Satuan = '$this->Satuan', IdPengguna = '$this->IdPengguna' WHERE IdBarang = '$this->IdBarang'";
        mysqli_query($conn, $sql);
    }

    public function deleteData($IdBarang)
    {
        $sql = "DELETE FROM Barang WHERE IdBarang = '$IdBarang'";
        mysqli_query($conn, $sql);
    }
}
?>

<?php
class Pembelian
{
    private $IdPembelian;
    private $JumlahPembelian;
    private $HargaBeli;
    private $IdBarang;

    public function __construct($IdPembelian, $JumlahPembelian, $HargaBeli, $IdBarang)
    {
        $this->IdPembelian = $IdPembelian;
        $this->JumlahPembelian = $JumlahPembelian;
        $this->HargaBeli = $HargaBeli;
        $this->IdBarang = $IdBarang;
    }

    public function getIdPembelian()
    {
        return $this->IdPembelian;
    }

    public function setIdPembelian($IdPembelian)
    {
        $this->IdPembelian = $IdPembelian;
    }

    public function getJumlahPembelian()
    {
        return $this->JumlahPembelian;
    }

    public function setJumlahPembelian($JumlahPembelian)
    {
        $this->JumlahPembelian = $JumlahPembelian;
    }

    public function getHargaBeli()
    {
        return $this->HargaBeli;
    }

    public function setHargaBeli($HargaBeli)
    {
        $this->HargaBeli = $HargaBeli;
    }

    public function getIdBarang()
    {
        return $this->IdBarang;
    }

    public function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    public function getPembelian()
    {
        $sql = "SELECT * FROM pembelian WHERE idPembelian = '$this->IdPembelian'";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }

    public function addPembelian()
    {
        $sql = "INSERT INTO pembelian (idPembelian, jumlahPembelian, hargaBeli, idBarang) 
                VALUES ('$this->IdPembelian', '$this->JumlahPembelian', '$this->HargaBeli', '$this->IdBarang')";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }
}
?>

<?php
class Supplier
{
    private $IdSupplier;
    private $IdPembelian;
    private $IdPengguna;

    public function __construct($IdSupplier, $IdPembelian, $IdPengguna)
    {
        $this->IdSupplier = $IdSupplier;
        $this->IdPembelian = $IdPembelian;
        $this->IdPengguna = $$IdPengguna;
    }

    public function getIdSupplier()
    {
        return $this->IdSupplier;
    }

    public function setIdSupplier($IdSupplier)
    {
        $this->IdSupplier = $IdSupplier;
    }
    
    public function getIdPembelian()
    {
        return $this->IdPembelian;
    }

    public function setIdPembelian($IdPembelian)
    {
        $this->IdPembelian = $IdPembelian;
    }

    public function getIdPengguna()
    {
        return $this->getIdPengguna;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function getSupplier()
    {
        $sql = "SELECT * FROM supplier WHERE idSupplier = '$this->IdSupplier'";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }

    public function addSupplier()
    {
        $sql = "INSERT INTO supplier (idSupplier, namaSupplier, keterangan, idPembelian, idBarang) 
                VALUES ('$this->IdSupplier', '$this->NamaSupplier', '$this->Keterangan', '$this->IdPembelian', '$this->IdBarang')";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }
}
?>

<?php
class Penjualan
{
    private $IdPenjualan;
    private $JumlahPenjualan;
    private $HargaJual;
    private $IdBarang;

    public function __construct($IdPenjualan, $JumlahPenjualan, $HargaJual, $IdBarang)
    {
        $this->IdPenjualan = $IdPenjualan;
        $this->JumlahPenjualan = $JumlahPenjualan;
        $this->HargaJual = $HargaJual;
        $this->IdBarang = $IdBarang;
    }

    public function getIdPenjualan()
    {
        return $this->IdPenjualan;
    }

    public function setIdPenjualan($IdPenjualan)
    {
        $this->IdPenjualan = $IdPenjualan;
    }

    public function getJumlahPenjualan()
    {
        return $this->JumlahPenjualan;
    }

    public function setJumlahPenjualan($JumlahPenjualan)
    {
        $this->JumlahPenjualan = $JumlahPenjualan;
    }

    public function getHargaJual()
    {
        return $this->HargaJual;
    }

    public function setHargaJual($HargaJual)
    {
        $this->HargaJual = $HargaJual;
    }

    public function getIdBarang()
    {
        return $this->IdBarang;
    }

    public function setIdBarang($IdBarang)
    {
        $this->IdBarang = $IdBarang;
    }

    public function getPenjualan()
    {
        $sql = "SELECT * FROM penjualan WHERE idPenjualan = '$this->IdPenjualan'";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }

    public function addPenjualan()
    {
        $sql = "INSERT INTO penjualan (idPenjualan, jumlahPenjualan, hargaJual, idBarang)
        VALUES ('$this->IdPenjualan', '$this->JumlahPenjualan', '$this->HargaJual', '$this->IdBarang')";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }
}
?>

<?php
class Pelanggan
{
    private $IdPelanggan;
    private $IdPenjualan;
    private $IdPengguna;

    public function __construct($IdPelanggan, $IdPenjualan, $IdPengguna)
    {
        $this->IdPelanggan = $IdPelanggan;
        $this->IdPenjualan = $IdPenjualan;
        $this->IdPengguna = $IdPengguna;
    }

    public function getIdPelanggan()
    {
        return $this->IdPelanggan;
    }

    public function setIdPelanggan($IdPelanggan)
    {
        $this->IdPelanggan = $IdPelanggan;
    }

    public function getIdPenjualan()
    {
        return $this->IdPenjualan;
    }

    public function setIdPenjualan($IdPenjualan)
    {
        $this->IdPenjualan = $IdPenjualan;
    }

    public function getIdPengguna()
    {
        return $this->IdPengguna;
    }

    public function setIdPengguna($IdPengguna)
    {
        $this->IdPengguna = $IdPengguna;
    }

    public function getPelanggan()
    {
        $sql = "SELECT * FROM pelanggan WHERE idPelanggan = '$this->IdPelanggan'";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }

    public function addPelanggan()
    {
        $sql = "INSERT INTO pelanggan (idPelanggan, idPenjualan, IdPengguna) 
                VALUES ('$this->IdPelanggan', '$this->IdPenjualan', '$this->IdPengguna')";

        $query = mysql_query($sql) or die(mysql_error());

        return $query;
    }
}
?>