<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Barang</title>
    <style>
        input {
            padding-bottom: 25px;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center; font-size: 2.5rem; font-weight: bold; padding-bottom: 20px; padding-top: 20px">Tambah Barang</h3>
    <form action="proses_tambah_barang.php" method="post" style="padding-left: 20px;">
        Nama Barang : 
        <input name="nama_barang" class="form-control"></input>
        Tanggal Pembelian : 
        <input type="date" name="tanggal_pengiriman" value="" class="form-control">
        Alamat : 
        <textarea name="alamat" class="form-control" rows="4"></textarea>
        Username :
        <input type="text" name="username_pelanggan" value="" class="form-control">
        Password : 
        <input type="password" name="password" value="" class="form-control">
        Jenis Pengiriman : 
        <select name="jenis_pengiriman" class="form-control">
            <option value="REGULER">REGULER</option>
            <option value="REGULER">HEMAT</option>
            <option value="EXPRESS">EXPRESS</option>
        </select>
        Tarif: 
         <select name="tarif" class="form-control">
             <option  value="25000">REGULER</option>
             <option  value="15000">HEMAT</option>
             <option value="40000">EXPRESS</option>
         </select>
        ID_user :
        <select name="id_user" class="form-control">
            <option>
            <?php 
            include "koneksi.php";
            $qry_barang= pg_query($conn,"select * from pelanggan");
            while($data_user= pg_fetch_array($qry_barang)){
                echo '<option value ="'.$data_user['id_user'].'">'.$data_user['kode_user'];    
            }
            ?>
            </option>
        </select>
        <input type="submit" name="simpan" value="Tambah Barang" class="btn btn-primary">
    </form>
</body>
</html>
