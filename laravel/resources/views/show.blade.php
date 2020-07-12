<div="biodata">
    <h2>Detail Biodata</h2>
    <table class="table" border="1">
        <tr>
            <th>NIM : </th>
            <td>{{ $biodata->nim }}</td>
        </tr>   
        <tr>
            <th>Nama : </th>
            <td>{{ $biodata->nama }}</td>
        </tr> 
        <tr>
            <th>Prodi : </th>
            <td>{{ $biodata->prodi }}</td>
        </tr>
        <tr>
            <th>Kelas : </th>
            <td>{{ $biodata->kelas['nama_kelas'] }}</td>
        </tr>
        <tr>
            <th>Nama Ibu Kandung : </th>
            <td>{{ !empty($biodata->ibukandung['nama_ibukandung'])?
                                $biodata->ibukandung['nama_ibukandung'] : '-'}}</td>   
        </tr>
        <tr>
            <th>Tanggal Lahir : </th>
            <td>{{ $biodata->tanggal_lahir }}</td>
        </tr> 
        <tr>
            <th>Alamat : </th>
            <td>{{ $biodata->alamat }}</td>
        </tr>  
        <tr>
            <th>Hobi : </th>
            <td>{{ $biodata->hobi }}</td>
        </tr>  
        <tr>
            <th>Quote : </th>
            <td>{{ $biodata->quote }}</td>
        </tr> 
        <tr>
            <th>Foto : </th>
            <td>
                <img src="{{ asset('/public/fotoupload/'.$biodata->foto) }}">
            </td>
        </tr>
    </table>
</div>