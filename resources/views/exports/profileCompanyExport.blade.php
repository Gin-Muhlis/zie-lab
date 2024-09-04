<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>Nama/Judul</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Deskripsi</th>
            <th>Logo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $data->title }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->about }}</td>
            
        </tr>
    </tbody>
</table>
