<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
    include "koneksi.php";
    $qry_get_pelanggan=mysqli_query($conn,"select * from pelanggan where 
id_pelanggan = '".$_GET['id_pelanggan']."'");
    $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
    ?>
    <h3>Update pelanggan</h3>
    <form action="proses_ubah_user.php" method="post">
        <input type="hidden" name="id_pelanggan" value= 
  "<?=$dt_pelanggan['id_pelanggan']?>">
        nama:
  <input type="text" name="nama" value=   "<?=$dt_pelanggan['nama']?>" class="form-control">
       telp: 
  <input type="text" name="telp" value="<?=$dt_pelanggan['telp']?>" class="form-control">
        Alamat : 
    <textarea name="alamat" class="form-control" rows="4"><?=$dt_pelanggan['telp']?></textarea>
        password: 
  <input type="text" name="pw" value="<?=$dt_pelanggan['password']?>" class="form-control">
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
    <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>