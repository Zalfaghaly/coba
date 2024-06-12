<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Product</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>

<body>
    <h1>Employee List</h1>
    <table class="table table-bordered">
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
</body>

</html>
