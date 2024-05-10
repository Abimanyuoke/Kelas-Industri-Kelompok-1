<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tampil Barang</title>
</head>
<body>
    <h3>Tampil Barang</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>USERNAME</th>
                <th>TANGGAL PENGIRIMAN</th>
                <th>NAMA BARANG</th>
                <th>ALAMAT</th>
                <th>KODE USER</th>
                <th>JENIS PENGIRIMAN</th>
                <th>TARIF</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_barang = pg_query($conn, "SELECT barang.*, barang.username_pelanggan, pelanggan.kode_user FROM barang JOIN pelanggan ON barang.id_user = pelanggan.id_user");
            if (!$qry_barang) {
                echo "Query failed: " . pg_last_error($conn);
                exit;
            }
            $no = 0;
            while ($data_barang = pg_fetch_assoc($qry_barang)) {
                $no++;
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$data_barang['username_pelanggan']?></td>
                <td><?=$data_barang['tanggal_pengiriman']?></td>
                <td><?=$data_barang['nama_barang']?></td>
                <td><?=$data_barang['alamat']?></td>
                <td><?=$data_barang['kode_user']?></td>
                <td><?=$data_barang['jenis_pengiriman']?></td>
                <td><?=$data_barang['tarif']?></td>
                <td>
                    <a href="ubah_barang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-success">Ubah</a> |
                    <a href="hapus.php?id_barang=<?=$data_barang['id_barang']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>
