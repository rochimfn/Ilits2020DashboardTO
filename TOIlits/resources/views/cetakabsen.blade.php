<!doctype html>
<html lang="en">
  <head>
    <title>Absen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table{
            border:1px solid black;
            width:100%;
        }
        tr{
            border:1px solid black;
        }
        th{
            text-align: center;
            border:1px solid black;
        }
        td{
            text-align: center;
            padding: 8px;
            border:1px solid black;
        }
        
    </style>
  </head>
  <body>
        <center><h4>Daftar Absen</h4>
        <h4>{{ $forda }}</h4></center>
    <table style="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Token</th>
                <th>TTD</th>
            </tr>
        </thead>
        <tbody>
            <?php $x=1; ?>
            @foreach($peserta as $p)
                <tr>
                    <td style="width:50px"><?= $x;?></td>
                    <td>{{$p->nama}}</td>
                    <td>ILITS-##-#####-#-###</td>
                    <td style="width:100px;">
                        
                    </td>
                </tr>
                <?php $x++; ?>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>