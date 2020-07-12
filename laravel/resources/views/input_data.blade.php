<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form action="{{ url('tampilkan')}}" method="POST">
        @csrf
        <div class="form-group"><label for="nama">Nama : </label><input type="text" name="nama"></div><br>
        <div class="form-group"><label for="prodi">Prodi : </label><input type="text" name="prodi"></div><br> 
        <div class="form-group"><label for="tanggal_lahir">Tanggal Lahir : </label><input type="date" name="tanggal_lahir"></div><br>
        <div class="form-group"><label for="alamat">Alamat : </label><textarea name="alamat" id="" cols="30" rows="10"></textarea></div><br>  
        <div class="form-group"><label for="hobi">Hobi : </label><input type="text" name="hobi"></div><br>
        <div class="form-group"><label for="quote">Quote : </label><input type="text" name="quote"></div><br>
        <div class="form-group">
            <input class="btn btn-primary form-control" type="submit" value="Simpan">
        </div>
        </form>
</body>
</html>