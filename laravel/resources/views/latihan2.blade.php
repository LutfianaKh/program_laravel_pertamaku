Dengan blade<br>
Selamat Sore {{ $nama}}
<br>
@if($nama == "Lutfiana")
            Anggota lama
@else       
            Anggota baru
@endif
<br>
@for($i=1;$i<=10;$i++)
        {{ $i }}
@endfor