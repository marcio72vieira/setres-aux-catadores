<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Companhia</title>
</head>


<body>
    <table style="width: 1080px">

        @foreach ($companhias as $companhia)
            <tr @if($loop->even) style="background-color: #e3e3e3;" @endif>
                <td class="dados" style="width: 50px;">{{$companhia->id}}</td>
                <td class="dados" style="width: 250px;">{{$companhia->nome}}</td>
                <td class="dados" style="width: 110px;">{{$companhia->cnpj}}</td>
                <td class="dados" style="width: 90px;">{{$companhia->foneum}}</td>
                <td class="dados" style="width: 200px;">{{$companhia->presidente}}</td>
                <td class="dados" style="width: 90px;">{{$companhia->fonepresidente}}</td>
                <td class="dados" style="width: 200px;">{{$companhia->vicepresidente}}</td>
                <td class="dados" style="width: 90px;">{{$companhia->fonevicepresidente}}</td>
            </tr>
        @endforeach

    </table>
</body>
</html>

