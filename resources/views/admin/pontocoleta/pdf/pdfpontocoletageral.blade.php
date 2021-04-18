<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - PONTOS DE COLETA</title>
</head>


<body>
    @foreach ($pontoscoleta as $pontocoleta )
        <div @if($loop->even) style="background-color: #e3e3e3;" @endif>
        <table style="width: 717px; border-collapse: collapse;">
            <tr>
                <td style="width: 450;" class="label-ficha">NOME</td>
                <td colspan="2" style="width: 267px;" class="label-ficha">COMPANHIA</td>
            </tr>
            <tr>
                <td style="width: 450px;" class="dados-ficha">{{$pontocoleta->nome}}</td>
                <td colspan="2" style="width: 267px;" class="dados-ficha">{{$pontocoleta->companhia->nome}}</td>
            </tr>
            <tr>
                <td style="width: 450px;" class="label-ficha">ENDEREÇO</td>
                <td style="width: 50px;" class="label-ficha">Nº</td>
                <td style="width: 217px;" class="label-ficha">BAIRRO</td>
            </tr>
            <tr>
                <td style="width: 450px;" class="dados-ficha">{{$pontocoleta->endereco}}</td>
                <td style="width: 50px;" class="dados-ficha">{{$pontocoleta->numero}}</td>
                <td style="width: 217px;" class="dados-ficha">{{$pontocoleta->bairro->nome}}</td>
            </tr>
        </table>

        <table style="width: 717px; border-collapse: collapse;">
            <tr>
                <td style="width: 300px;" class="label-ficha">COMPLEMENTO</td>
                <td style="width: 300px;" class="label-ficha">CIDADE</td>
                <td style="width: 117px;" class="label-ficha">ZONA</td>
            </tr>
            <tr>
                <td style="width: 300px;" class="dados-ficha">{{$pontocoleta->complemento}}</td>
                <td style="width: 300px;" class="dados-ficha">{{$pontocoleta->municipio->nome}}</td>
                <td style="width: 117px;" class="dados-ficha">{{$pontocoleta->zona}}</td>
            </tr>
            <tr>
                <td colspan="3" style="width: 717px;" class="label-ficha">RESÍDUOS COM QUE TRABALHA</td>
            </tr>
            <tr>
                <td colspan="3" style="width: 717px;" class="dados-ficha">
                    @foreach ($pontocoleta->residuos as $residuo)
                        {{$residuo->nome}};&nbsp;&nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="3" style="width:717px;" class="close-ficha"></td>
            </tr>
        </table>
        </div>
        <br>
        @if($loop->iteration % 6 == 0)
        <pagebreak />
        {{-- <barcode code="978-0-9542246-0" type="ISBN" height="0.66" text="1" />--}}
        @endif
    @endforeach

</body>
</html>
