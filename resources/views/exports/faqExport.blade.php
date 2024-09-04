<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->question }}</td>
                <td>{{ $item->answer }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
