<div id="biodata">
    <h2>Biodata</h2>
    <a href="buat_pdf" class="btn btn-primary" target="_blank">CETAK LAPORAN</a>
    @include('form_pencarian')
    @if (!empty($biodata_list))
        <table class="table" border="1">
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($biodata_list as $biodata)
            <tr>
                <td>{{ $biodata->nim }}</td>
                <td>{{ $biodata->nama }}</td>
                <td>{{ $biodata->prodi }}</td>
                <td>{{ $biodata->kelas['nama_kelas']}}</td>
                <td>{{ $biodata->tanggal_lahir }}</td>
                <td>{{ $biodata->alamat }}</td>
                <td>{{ $biodata->hobi }}</td>
                <td>{{ $biodata->quote }}</td>
                <td>{{ !empty($biodata->ibukandung['nama_ibukandung'])?
                            $biodata->ibukandung['nama_ibukandung'] : '-' }}</td>      
                <td><a href="{{ url('detail_biodata/'.$biodata->id) }}">Detail</a>
                @if(Auth::check())
                <a href="{{ url('edit_biodata/'.$biodata->id.'/edit') }}">Edit</a>
                @endif
                @if(Auth::check())
                <a href="{{ url('hapus/'.$biodata->id) }}">Hapus</a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    @endif

    <div>
        <strong>Jumlah Biodata : {{ $jumlah_biodata }}</strong>
    </div>
</div>