<table class="table" border="1" style="font-family: sans-serif; color:#232323; border-collapse:collapse; border:1px solid#999; padding:8px 20px; text-align:left;" >
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Nilai Rata Rata</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $s)
        <tr>
            <th style="text-align:left">{{$s->nama}}</th>
            <th style="text-align:rigleftht">{{$s->jenis_kelamin}}</th>
            <th>{{$s->agama}}</th>
            <th>{{$s->rataRataNilai()}}</th>
        </tr>
        @endforeach
    </tbody>
</table>