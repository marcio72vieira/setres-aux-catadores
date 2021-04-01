<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Resíduo</title>
</head>


<body>
    <table class="table-corpo-" style="width: 100%">
        <thead>
            <tr>
                <th colspan="2" style="text-align: center; font-family:'helvetica'; font-size: 10px">RESÍDUOS SÓLIDOS</th>
            </tr>
            <tr>
                <td style="width: 30px">ID</td>
                <td>RES&Iacute;DUO</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($residuos as $residuo)
            <tr>
                <td style="width: 30px">{{$residuo->id}}</td>
                <td>{{$residuo->nome}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

