<table>
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
