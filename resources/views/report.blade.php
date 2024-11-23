<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Type Scan</th>
            <th>Nama Peserta</th>
            <th>Email</th>
            <th>HP</th>
            <th>Tanggal Scan</th>
        </tr>

        @foreach ($attendance as $item)
            @php
                $no = 1;
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ @$item->scan->title }}</td>
                <td>{{ @$item->participant->name }}</td>
                <td>{{ @$item->participant->email }}</td>
                <td>{{ @$item->participant->phone }}</td>
                <td>{{ @$item->scan_at }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
