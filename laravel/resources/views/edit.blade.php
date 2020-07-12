<div class="biodata">
<h2>Edit Biodata</h2>

    <form method="POST" action="/update/{{ $biodata->id }}" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <table class="table" border="0">
    <tr>
        <th>NIM : </th>
        <td><input type="text" required="required" name="nim" value="{{ $biodata->nim }}"></td>
    </tr>
    <tr>
        <th>Nama : </th>
        <td><input type="text" required="required" name="nama" value="{{ $biodata->nama }}"></td>
    </tr>
    <tr>
        <th>Prodi : </th>
        <td><input type="text" required="required" name="prodi" value="{{ $biodata->prodi }}" ></td>
    </tr>
    <tr>
        <th>Kelas : </th>
        <td>
        <select name="id_kelas">
            @foreach ($list_kelas as $key => $value)
                <option value="{{ $key }}" {{ ( $key == $biodata->id_kelas ) ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
        </td>
    </tr>
    <tr>
        <th>Tanggal Lahir : </th>
        <td><input type="date" required="required" name="tanggal_lahir" value="{{ $biodata->tanggal_lahir }}"></td>
    </tr>
    <tr>
        <th>Alamat : </th>
        <td><input type="text" required="required" name="alamat" value="{{ $biodata->alamat }}"></td>
    </tr>
    <tr>
        <th>Hobi : </th>
        <td><input type="text" required="required" name="hobi" value="{{ $biodata->hobi }}"></td>
    </tr>
    <tr>
        <th>Quote : </th>
        <td><input type="text" required="required" name="quote" value="{{ $biodata->quote }}"></td>
    </tr>
    <tr>
        <th>Nama Ibu Kandung :</th>
        <td><input type="text" required="required" name="nama_ibukandung" value="{{ $biodata->ibukandung['nama_ibukandung'] }}"></td>
    </tr>
    <tr>
        <th>Foto : </th>
        <td> <img src="{{ asset('/public/fotoupload/'.$biodata->foto) }}"><br>
            <input type="file" required="required" name="foto" value="{{ $biodata->foto }}"></td>
    </tr>
    <tr>
        <td></td>
        <td><input class="btn btn-primary form-control" type="submit" value="Simpan"></td>
    </tr>
    </table>
    </form>
</div>
