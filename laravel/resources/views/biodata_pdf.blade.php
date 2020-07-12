<DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
    table tr td,
    table tr th{
        font-size: 9pt;
    }
    </style>
    <center><h5>Laporan Data Biodata</h4></center>
    <table class='table table-bordered'>
        <thead>
        <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Kelas</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Hobi</th>
        <th>Quote</th>
        <th>Nama Ibu Kandung</th>
        </tr>
        </thead>
        <tBody>
        @php $i=1 @endphp
        @foreach($biodata_list as $biodata)
        <tr>
        <td>{{ $biodata->nim }}</td>
        <td>{{ $biodata->nama }}</td>
        <td>{{ $biodata->prodi }}</td>
        <td>{{ $biodata->kelas['nama_kelas'] }}</td>
        <td>{{ $biodata->tanggal_lahir }}</td>
        <td>{{ $biodata->alamat }}</td>
        <td>{{ $biodata->hobi }}</td>
        <td>{{ $biodata->quote }}</td>
        <td>{{ !empty($biodata->ibukandung['nama_ibukandung'])?
                            $biodata->ibukandung['nama_ibukandung'] : '-' }}</td>
        </tr>
        @endforeach
        </tBody>
    </table>
</body>
</html>