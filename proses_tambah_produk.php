<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_produk']) && isset($_POST['deskripsi']) && isset($_POST['foto'])) {
        $nama_produk = $_POST['nama_produk'] ?? '';
        $deskripsi = $_POST['deskripsi'] ?? '';
        $foto = $_POST['foto'] ?? '';

        if (empty($nama_produk)) {
            echo "<script>alert('Nama produk tidak boleh kosong');window.location.href='tambah_produk.php'</script>";
        } else if (empty($foto)) {
            echo "<script>alert('Foto tidak boleh kosong');window.location.href='tambah_produk.php'</script>";
        } else {
            include "koneksi.php";
            $query = "INSERT INTO produk (nama_produk, deskripsi, foto) VALUES ($1, $2, $3)";
            $stmt = pg_prepare($conn, "", $query);
            if (!$stmt) {
                die("Prepare failed: " . pg_last_error($conn));
            }

            $result = pg_execute($conn, "", array($nama_produk, $deskripsi, $foto));
            if ($result) {
                echo "<script>alert('Sukses menambahkan Produk');window.location.href='tambah_produk.php'</script>";
            } else {
                $error_message = pg_last_error($conn);
                echo "<script>alert('Gagal menambahkan Produk: $error_message');window.location.href='tambah_produk.php'</script>";
            }
        }
    } else {
        echo "<script>alert('Data tidak lengkap');window.location.href='tambah_produk.php'</script>";
    }
}
?>
