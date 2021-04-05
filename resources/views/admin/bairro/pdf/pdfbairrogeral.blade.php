<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Bairro</title>
</head>


<body>
    <table style="width: 100%">

        @foreach ($bairros as $bairro)
            <tr>
                <td class="dados" style="width: 10%">{{$bairro->id}}</td>
                <td class="dados" style="width: 90%">{{$bairro->nome}}</td>
            </tr>
        @endforeach

    </table>
</body>
</html>

