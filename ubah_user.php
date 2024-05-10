<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "koneksi.php";
    $qry_get_siswa = pg_query($conn,"select * from barang where 
id_barang = '".$_GET['id_barang']."'");
    $dt_barang = pg_fetch_array($qry_get_barang);
    ?>
    <h3>Tambah Siswa</h3>
    <form action="proses_tambah_barang.php" method="post">
        <input type="hidden" name="id_barang" value= 
  "<?=$dt_barang['id_barang']?>">
   Nama Barang :
  <input type="text" name="nama_barang" value=   "<?=$dt_barang['nama_barang']?>" class="form-control">
  Tenggal Pembelian :
  <input type="date" name="tanggal_pengiriaman" value=   "<?=$dt_barang['nama_barang']?>" class="form-control">
  Alamat :
  <input type="text" name="alamat" value=   "<?=$dt_barang['alamat']?>" class="form-control">
  Username :
  <input type="text" name="username_pelanggan" value=   "<?=$dt_barang['username_pelanggan']?>" class="form-control">
  Password : 
  <input type="password" name="password" value="" class="form-control">
  Jenis Pengiriman : 
        <?php 
        $arr_jenis_pengiriman=array('REGULER'=>'REGULER','EXPRESS'=>'EXPRESS');
        ?>
        <select name="jenis_pengiriman" class="form-control">
            <?php foreach ($arr_jenis_pengiriman as $key_jenis_pengiriman => $val_jenis_pengiriman):
                if($key_jenis_pengiriman==$dt_barang['jenis_pengiriman']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
                <option value="<?=$key_jenis_pengiriman?>" <?=$selek?>><?=$val_jenis_pengiriman
        ?></option>
            <?php endforeach ?>
        </select>
     Tarif : 
        <?php 
        $arr_tarif=array('15.000 - 30.000'=>'REGULER','25.000 - 40.000'=>'EXPRESS');
        ?>
        <select name="tarif" class="form-control">
            <?php foreach ($arr_tarif as $key_tarif => $val_tarif):
                if($key_tarif==$dt_barang['tarif']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
<option value="<?=$key_tarif?>" <?=$selek?>><?=$val_tarif
?></option>
            <?php endforeach ?>
        </select>
        Kelas :
        <select name="id_user" class="form-control">
            <?php 
            include "koneksi.php";
            $qry_kelas=mysqli_query($conn,"select * from kelas");
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                if($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                    $selek="selected";
                } else {
                    $selek="";
                }
echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.'>'.$data_kelas['nama_kelas'].'</option>';   
            }
            ?>
        </select>
        Username : 
<input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control">
<input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>