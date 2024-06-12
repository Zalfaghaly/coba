<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Code</th>
            <th>Name Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Product as $index => $Products)
        <tr>
            <td align="center">{{ $index + 1 }}</td>
            <td>{{ $Products->kodeproduk }}</td>
            <td>{{ $Products->namaproduk }}</td>
            <td>{{ $Products->harga }}</td>
            <td>{{ $Products->stock }}</td>
            <td>{{ $Products->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


