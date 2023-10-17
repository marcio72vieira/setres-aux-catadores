<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Relatório Geral</title>
</head>


<body style="vertical-align:baseline">
    <table style="width: 1080px; border-collapse: collapse;">

        @php
            $total_companhias = 0;
            $total_tipos = 0;
            $total_catadores = 0;
            $total_catadoresmasculinos = 0;
            $total_catadoresfemininos = 0;
            $totoal_catadorescomcarteiras = 0;
            $total_catadoressemcarteiras = 0;
            $total_pontocoletas = 0
        @endphp

        @foreach ($municipio as $dado)
            <tr @if($loop->even) style="background-color: #e3e3e3;" @endif>
                <td style="width: 35px;" class="dados-lista-dashboard">{{$dado->idCompanhia}}</td>
                <td style="width: 270px;" class="dados-lista-dashboard">{{$dado->companhia_nome}}</td>
                <td style="width: 80px;" class="dados-lista-dashboard">{{$dado->companhia_tipo}}</td>
                <td style="width: 80px;" class="dados-lista-dashboard" style="text-align: right">{{$dado->companhia_totalcatadores}}</td>
                <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: right">{{$dado->companhia_totalmasc}}</td>
                <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: right">{{$dado->companhia_totalfeme}}</td>
                <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: right">{{$dado->companhia_totalcomcarteira}}</td>
                <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: right">{{$dado->companhia_totalsemcarteira}}</td>
                <td style="width: 60px;" class="dados-lista-dashboard" style="text-align: center">{{$dado->pontocoleta_total}}</td>
                <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center">{{$dado->residuo_total}}</td>
                <td style="width: 275px;" class="dados-lista-dashboard">{{$dado->nomeResiduo}}</td>
            </tr>
            @php
                $total_companhias ++;
            @endphp
        @endforeach

        <tr style="background-color: #e3e3e3;">
            <td style="width: 35px;" class="dados-lista-dashboard">{{ $total_companhias }}</td>
            <td style="width: 270px; text-align: center;" class="dados-lista-dashboard">{{ $total_companhias }}</td>
            <td style="width: 80px;" class="dados-lista-dashboard"></td>
            <td style="width: 80px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 60px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 50px;" class="dados-lista-dashboard" style="text-align: center"></td>
            <td style="width: 275px;" class="dados-lista-dashboard"></td>
        </tr>

    </table>
</body>
</html>

