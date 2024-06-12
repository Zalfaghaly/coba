<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama penerima</th>
            <th>Alamat</th>
            <th>No_hp</th>
            <th>Jumlah</th>
            <th>Biaya</th>
            <th>Metode</th>
            <th>Status</th>
            <th>Code Product</th>
            <th>Nama Pemesan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bayar as $index => $bayars)
        <tr>
            <td align="center">{{ $index + 1 }}</td>
            <td>{{ $bayars->nama_penerima }}</td>
            <td>{{ $bayars->alamat }}</td>
            <td>{{ $bayars->no_hp}}</td>
            <td>{{ $bayars->jumlah }}</td>
            <td>{{ $bayars->biaya }}</td>
            <td>{{ $bayars->metode->metod}}</td>
            <td>{{ $bayars->statuse->proses }}</td>
            <td>{{ $bayars->product->kodeproduk }}</td>
            <td>{{ $bayars->user->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
