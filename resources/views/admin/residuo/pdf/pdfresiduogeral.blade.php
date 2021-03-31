<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="{{asset('pdf/mpdf.css')}}" rel="stylesheet" type="text/css">-->

    <title>Resíduo</title>
</head>


<body>
    <table class="blueTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>RES&Iacute;DUO</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="2">FOOTER DA TABELA</td>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($residuos as $residuo)
            <tr>
                <td>{{$residuo->id}}</td>
                <td>{{$residuo->nome}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

