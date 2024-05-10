<?php
include_once('koneksi.php');
if($_POST){
    $nama_user=$_POST['nama_user'];
    $kode_user=$_POST['kode_user'];
    $gender = $_POST['gender'];
    if(empty($nama_user)){
        echo "<script>alert('nama user tidak boleh kosong');location.href='tambah_user.php';</script>";
    } elseif(empty($kode_user)){
        echo "<script>alert('kelompok tidak boleh kosong');location.href='tambah_user.php';</script>";
    } else {
        $insert = pg_query ($conn,"insert into pelanggan (nama_user, kode_user, gender) values ('$nama_user','$kode_user', '$gender')");
        if($insert){
            echo "<script>alert('Sukses menambahkan user');location.href='tambah_user.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan user');location.href='tambah_user.php';</script>";
        }
    }
}
?>