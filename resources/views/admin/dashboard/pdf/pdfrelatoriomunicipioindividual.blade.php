<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Relatório Geral</title>
</head>


<body style="vertical-align:baseline">
    <table style="width: 1080; border-collapse: collapse;">

        @php
            $total_companhias = 0;
            $total_tipos = 0;
            $total_catadores = 0;
            $total_catadoresmasculinos = 0;
            $total_catadoresfemininos = 0;
            $totoal_catadorescomcarteiras = 0;
            $total_catadoressemcarteiras = 0;
            $total_pontocoletas = 0;

            $arrTipos = array();

        @endphp

        @foreach ($municipio as $dado)
            <tr @if($loop->even) style="background-color: #e3e3e3;" @endif>
                <td style="width: 35px" class="dados-lista-dashboard">{{$dado->idCompanhia}}</td>
                <td style="width: 300px" class="dados-lista-dashboard">{{$dado->companhia_nome}}</td>
                <td style="width: 80px" class="dados-lista-dashboard">{{$dado->companhia_tipo}}</td>
                <td style="width: 80px; text-align:center" class="dados-lista-dashboard">{{$dado->companhia_totalcatadores}}</td>
                <td style="width: 50px; text-align:center" class="dados-lista-dashboard">{{$dado->companhia_totalmasc}}</td>
                <td style="width: 50px; text-align:center" class="dados-lista-dashboard">{{$dado->companhia_totalfeme}}</td>
                <td style="width: 50px; text-align:center" class="dados-lista-dashboard">{{$dado->companhia_totalcomcarteira}}</td>
                <td style="width: 50px; text-align:center" class="dados-lista-dashboard">{{$dado->companhia_totalsemcarteira}}</td>
                <td style="width: 60px; text-align:center" class="dados-lista-dashboard">{{$dado->pontocoleta_total}}</td>
                <td style="width: 50px; text-align:center" class="dados-lista-dashboard">{{$dado->residuo_total}}</td>
                <td style="width: 275px;" class="dados-lista-dashboard">{{$dado->nomeResiduo}}</td>
            </tr>
            @php
                $total_companhias ++;
                $total_catadores = $total_catadores + $dado->companhia_totalcatadores;
                $total_catadoresmasculinos = $total_catadoresmasculinos + $dado->companhia_totalmasc;
                $total_catadoresfemininos = $total_catadoresfemininos + $dado->companhia_totalfeme;
                $totoal_catadorescomcarteiras = $totoal_catadorescomcarteiras + $dado->companhia_totalcomcarteira;
                $total_catadoressemcarteiras = $total_catadoressemcarteiras + $dado->companhia_totalsemcarteira;
                $total_pontocoletas =  $total_pontocoletas + $dado->pontocoleta_total;

                $arrTipos[] = in_array($dado->companhia_tipo, $arrTipos) ? $dado->companhia_tipos : null;
            @endphp


            {{--
                @if(in_array($dado->companhia_tipo, $arrTipos))
                $arrTipos[] = $dado->companhia_tipo;
            @endif
            --}}



        @endforeach


        <tr style="background-color: #e3e3e3">
            <td style="width: 35px" class="dados-lista-dashboard"></td>
            <td style="width: 300px; text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_companhias }}</td>
            <td style="width: 80px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ count($arrTipos) }}</td>
            <td style="width: 80px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_catadores }}</td>
            <td style="width: 50px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_catadoresmasculinos }}</td>
            <td style="width: 50px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_catadoresfemininos }}</td>
            <td style="width: 50px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $totoal_catadorescomcarteiras }}</td>
            <td style="width: 50px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_catadoressemcarteiras }}</td>
            <td style="width: 60px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard">{{ $total_pontocoletas }}</td>
            <td style="width: 50px;  text-align:center; font-weight: bold;" class="dados-lista-dashboard"></td>
            <td style="width: 275px;" class="dados-lista-dashboard">{{$dado->nomeResiduo}}</td>
        </tr>
    </table>
</body>
</html>

