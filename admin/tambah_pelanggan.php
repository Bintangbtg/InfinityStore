<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tambah Pelanggan</h3>
    <form action="proses_tambah_pelanggan.php" method="post">
        nama : 
        <input type="text" name="nama" value="" class="form-control">
        alamat :
        <textarea name="alamat" class="form-control" rows="4"></textarea>
        telepon : 
        <input type="text" name="telp" value="" class="form-control">
        <br>
        Role:
        <?php 
        $arr_role=array('admin'=>'admin','pelanggan'=>'pelanggan');
        ?>
        <select name="role" class="form-control">
            <option></option>
            <?php foreach ($arr_role as $key_role => $val_role):
                if($key_role==$dt_pelanggan['role']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
             <option value="<?=$key_role?>" <?=$selek?>><?=$val_role?></option>
            <?php endforeach ?>
        </select>
        <br>
        Password : 
        <input type="text" name="pw" value="" class="form-control">
        <br>
        <input type="submit" name="simpan" value="Tambah Pelanggan" class="btn btn-primary">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
