<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    </head>
<body>
    <h3 style="text-align: center; font-weight: bold;">Tambah User</h3>
    <form action="proses_tambah_user.php" method="post" style="display: block; margin-left: 20px">
        Nama User :
        <input type="text" name="nama_user" value="" class="form-control">
        Kode Pelanggan : 
        <input type="text" name="kode_user" value="" class="form-control">
        Gender : 
        <select name="gender" class="form-control">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <input type="submit" name="simpan" value="Tambah User" class="btn btn-primary" style="margin-top: 20px">
    </form>
</body>
</html>