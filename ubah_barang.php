<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "koneksi.php";
    
    // Check if id_barang is set in $_GET
    if (!isset($_GET['id_barang'])) {
        echo "Error: ID Barang not specified.";
        exit;
    }

    $id_barang = $_GET['id_barang'];

    // Fetch data based on id_barang
    $qry_get_barang = pg_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
    if (!$qry_get_barang) {
        echo "Query failed: " . pg_last_error($conn);
        exit;
    }

    $dt_barang = pg_fetch_array($qry_get_barang);
    ?>
    <h3>Ubah Barang</h3>
    <form action="proses_ubah_barang.php" method="post">
        <input type="hidden" name="id_barang" value="<?=$dt_barang['id_barang']?>">
        Nama Barang :
        <input type="text" name="nama_barang" value="<?=$dt_barang['nama_barang']?>" class="form-control">
        Tanggal Pengiriman :
        <input type="date" name="tanggal_pengiriman" value="<?=$dt_barang['tanggal_pengiriman']?>" class="form-control">
        Alamat :
        <input type="text" name="alamat" value="<?=$dt_barang['alamat']?>" class="form-control">
        Username Pelanggan :
        <input type="text" name="username_pelanggan" value="<?=$dt_barang['username_pelanggan']?>" class="form-control">
        Password : 
        <input type="password" name="password" value="" class="form-control">
        Jenis Pengiriman : 
        <?php 
        $arr_jenis_pengiriman = array('REGULER' => 'REGULER', 'EXPRESS' => 'EXPRESS');
        ?>
        <select name="jenis_pengiriman" class="form-control">
            <?php foreach ($arr_jenis_pengiriman as $key_jenis_pengiriman => $val_jenis_pengiriman):
                $selek = ($key_jenis_pengiriman == $dt_barang['jenis_pengiriman']) ? "selected" : "";
            ?>
            <option value="<?=$key_jenis_pengiriman?>" <?=$selek?>><?=$val_jenis_pengiriman?></option>
            <?php endforeach ?>
        </select>
        Tarif : 
        <?php 
        $arr_tarif = array('15.000 - 30.000' => 'REGULER', '25.000 - 40.000' => 'EXPRESS');
        ?>
        <select name="tarif" class="form-control">
            <?php foreach ($arr_tarif as $key_tarif => $val_tarif):
                $selek = ($key_tarif == $dt_barang['tarif']) ? "selected" : "";
            ?>
            <option value="<?=$key_tarif?>" <?=$selek?>><?=$val_tarif?></option>
            <?php endforeach ?>
        </select>
        ID User :
        <select name="id_user" class="form-control">
            <?php 
            $qry_pelanggan = pg_query($conn,"SELECT * FROM pelanggan");
            while ($data_pelanggan = pg_fetch_array($qry_pelanggan)){
                $selek = ($data_pelanggan['id_user'] == $dt_barang['id_user']) ? "selected" : "";
                echo '<option value="'.$data_pelanggan['id_user'].'" '.$selek.'>'.$data_pelanggan['nama_user'].'</option>';   
            }
            ?>
        </select>
        <input type="submit" name="simpan" value="Ubah Barang" class="btn btn-primary">
    </form>
</body>
</html>
