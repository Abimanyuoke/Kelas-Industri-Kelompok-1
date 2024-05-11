<?php 
    if($_GET['id_barang']){
        include "koneksi.php";
        $qry_hapus= pg_query($conn,"delete from barang where id_barang='".$_GET['id_barang']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus siswa');location.href='tampil_barang.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus siswa');location.href='tampil_barang.php';</script>";
        }
    }
?>