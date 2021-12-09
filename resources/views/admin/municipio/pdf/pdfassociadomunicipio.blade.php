<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Associado Municipio</title>
</head>


<body>


    <table style="width: 1080px;  border-collapse: collapse; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
        @foreach ($municipio->companhias as $companhia)
            <tr style="background-color: #7f7f7f;">
                <td colspan="7" class="dados-lista-titulo">{{$companhia->nome}} ({{$companhia->associados()->count()}})</td>
            </tr>
            @foreach($companhia->associados as $associado)

                <tr @if($loop->even) style="background-color: #e3e3e3;" @endif>
                    <td style="width: 50px;" class="dados-lista">{{$associado->id}}</td>
                    <td style="width: 250px;" class="dados-lista">{{$associado->nome}}</td>
                    <td style="width: 110px;" class="dados-lista">{{$associado->rg}}<br>{{$associado->rgorgaoemissor}}</td>
                    <td style="width: 90px;" class="dados-lista">{{$associado->cpf}}</td>
                    <td style="width: 180px;" class="dados-lista">{{$associado->foneum}}; {{$associado->foneum}} </td>
                    <td style="width: 200px;" class="dados-lista">{{$associado->companhia->nome}}</td>
                    <td style="width: 200px;" class="dados-lista">
                        @foreach($associado->areas as $area)  {{$area->nome}} @endforeach - ({{$associado->municipio->nome}})
                    </td>
                </tr>
            @endforeach
            {{-- @php $mpdf->AddPage() @endphp --}}
        @endforeach
    </table>

</body>
</html>

