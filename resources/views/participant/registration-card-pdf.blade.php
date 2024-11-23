<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID CARD</title>

    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h1 style="font-size:60pt">Meet AP</h1>
        <div style="text-align: center;">
            <img style="" width="150px" height="150px" src="data:image/png;base64,{{ $qr_code }}"
                alt="" />
        </div>
        <table style="margin-top: 60px; width:100%; font-size:15pt">
            <tr>
                <td style="width: 20%">&nbsp;</td>
                <td style="width: 20%">Nama</td>
                <td style="width: 60%">{{ $participant->name }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Email</td>
                <td>{{ $participant->email }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>No Hp</td>
                <td>{{ $participant->phone }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
