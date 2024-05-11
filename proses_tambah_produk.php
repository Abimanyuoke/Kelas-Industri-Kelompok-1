<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_produk']) && isset($_POST['deskripsi']) && isset($_POST['foto'])) {
        $nama_produk = $_POST['nama_produk'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';
        $foto = $_POST['foto'] ?? '';

        if (empty($nama_produk)) {
            echo "<script>alert('Nama buku tidak boleh kosong');location.href='tambah_produk.php'</script>";
        } else if (empty($foto)) {
            echo "<script>alert('Foto tidak boleh kosong');location.href='tambah_produk.php'</script>";
        } else {
            include "koneksi.php";
            $stmt = $conn->prepare("INSERT INTO  produk (nama_produk, foto, deskripsi) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_produk, $foto, $deskripsi);
            if ($stmt->execute()) {
                echo "<script>alert('Sukses menambahkan Buku');window.location.href='tambah_produk.php'</script>";
            } else {
                echo "<script>alert('Gagal menambahkan Buku');window.location.href='tambah_produk.php'</script>";
            }
        }
    } else {
        echo "<script>alert('Data tidak lengkap');window.location.href='tambah_produk.php'</script>";
    }
}
?>