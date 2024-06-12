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
</body>

</html>
