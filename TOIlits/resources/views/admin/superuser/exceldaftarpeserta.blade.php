<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Peserta</title>
</head>
<body>
    
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Forda</th>
            <th>Asal</th>
            <th>Peserta</th>
            <th>Terkonfirmasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Indonesia</td>
            <td>Indonesia</td>
            <td>{{$pesertaseindonesia[0]->total}}</td>
            <td>{{$pesertaseindonesia[0]->terkonfirmasi}}</td>
        </tr>
        @foreach($peserta as $perforda)
        <tr>
            <td>{{$perforda->nama}}</td>
            <td>{{$perforda->asal}}</td>
            <td>{{$perforda->total}}</td>
            <td>{{$perforda->pesertaterkonfirmasi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>