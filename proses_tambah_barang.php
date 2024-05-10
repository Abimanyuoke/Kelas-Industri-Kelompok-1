<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_POST) {
    $nama_barang = $_POST['nama_barang'];
    $tanggal_pengiriman = $_POST['tanggal_pengiriman'];
    $alamat = $_POST['alamat'];
    $username_pelanggan = $_POST['username_pelanggan'];
    $password = $_POST['password'];
    $jenis_pengiriman = $_POST['jenis_pengiriman'];
    $tarif = isset($_POST['tarif']) ? intval($_POST['tarif']) : 0; // Validate and convert to integer
    $id_user = isset($_POST['id_user']) ? intval($_POST['id_user']) : 0; // Validate and convert to integer

    if (empty($username_pelanggan)) {
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } elseif (empty($tanggal_pengiriman)) {
        echo "<script>alert('tanggal tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } elseif (empty($nama_barang)) {
        echo "<script>alert('barang tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } else {
        include "koneksi.php";

        $query = "INSERT INTO barang (nama_barang, tanggal_pengiriman, alamat, username_pelanggan, password, jenis_pengiriman, tarif, id_user) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)";
        $params = array($nama_barang, $tanggal_pengiriman, $alamat, $username_pelanggan, $password, $jenis_pengiriman, $tarif, $id_user);

        $result = pg_query_params($conn, $query, $params);
        if ($result) {
            echo "<script>alert('Sukses menambahkan barang');location.href='tambah_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan barang: " . pg_last_error($conn) . "');location.href='tambah_barang.php';</script>";
        }
    }
}
?>
