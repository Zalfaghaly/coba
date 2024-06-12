<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
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
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $index => $users)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $users->id }}</td>
                <td>{{ $users->nama }}</td>
                <td>{{ $users->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
