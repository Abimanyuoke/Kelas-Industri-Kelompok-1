<?php
if ($_POST) {
    // Assuming $id_barang should be obtained from the form
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $tanggal_pengiriman = $_POST['tanggal_pengiriman'];
    $alamat = $_POST['alamat'];
    $username_pelanggan = $_POST['username_pelanggan'];
    $password = $_POST['password'];
    $jenis_pengiriman = $_POST['jenis_pengiriman'];
    $tarif = isset($_POST['tarif']) ? intval($_POST['tarif']) : 0; // Validate and convert to integer
    $id_user = isset($_POST['id_user']) ? intval($_POST['id_user']) : 0; // Validate and convert to integer

    if (empty($nama_barang)) {
        echo "<script>alert('Nama barang tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } elseif (empty($tanggal_pengiriman)) {
        echo "<script>alert('Tanggal pengiriman tidak boleh kosong');location.href='tambah_barang.php';</script>";
    } else {
        include "koneksi.php";
        // Assuming you want to update based on $id_barang
        if (empty($password)) {
            $update = pg_query($conn, "UPDATE barang SET nama_barang='$nama_barang', tanggal_pengiriman='$tanggal_pengiriman', jenis_pengiriman='$jenis_pengiriman', alamat='$alamat', username_pelanggan='$username_pelanggan', tarif='$tarif', id_user='$id_user' WHERE id_barang='$id_barang'") or die(pg_last_error($conn));
        } else {
            $update = pg_query($conn, "UPDATE barang SET nama_barang='$nama_barang', tanggal_pengiriman='$tanggal_pengiriman', jenis_pengiriman='$jenis_pengiriman', alamat='$alamat', username_pelanggan='$username_pelanggan', tarif='$tarif', id_user='$id_user' WHERE id_barang='$id_barang'") or die(pg_last_error($conn));
        }

        if ($update) {
            echo "<script>alert('Sukses update siswa');location.href='tampil_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal update siswa');location.href='ubah_barang.php?id_barang=".$id_barang."';</script>";
        }
    }
}
?>
