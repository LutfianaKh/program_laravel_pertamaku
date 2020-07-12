<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    @include('errors/form_error_list')
    <form action="{{ url('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group"><label for="nim">NIM : </label><input type="text" name="nim" value="{{ old('nim') }}"></div><br>
    <div class="form-group"><label for="nama">Nama : </label><input type="text" name="nama" value="{{ old('nama') }}"></div><br>
    <div class="form-group"><label for="prodi">Prodi : </label><input type="text" name="prodi" value="{{ old('prodi') }}"></div><br>
    <div class="form-group"><label for="kelas">Kelas : </label>
    @if(count($list_kelas) >0)
        <select name="id_kelas">
            @foreach ($list_kelas as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    @else
        Data Kelas Masih Kosong
    @endif
    </div>
    <div class="form-group"><label for="tanggal_lahir">Tanggal Lahir : </label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"></div><br>
    <div class="form-group"><label for="alamat">Alamat : </label><textarea name="alamat" id="" cols="30" rows="10" value="{{ old('alamat') }}"></textarea></div><br>
    <div class="form-group"><label for="hobi">Hobi : </label><input type="text" name="hobi" value="{{ old('hobi') }}"></div><br>
    <div class="form-group"><label for="quote">Quote : </label><input type="text" name="quote" value="{{ old('quote') }}"></div><br>
    <div class="form-group"><label for="nama_ibukandung">Nama Ibu Kandung : </label><input type="text" name="nama_ibukandung" value="{{ old('nama_ibukandung') }}"></div><br>
    <div class="form-group"><label for="foto">Foto : </label><input type="file" name="foto" value="{{ old('foto') }}"></div><br>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Simpan">
    </div>
    </form>
</body>
</html>