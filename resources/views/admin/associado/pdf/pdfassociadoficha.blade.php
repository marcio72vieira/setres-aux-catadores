<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SETRES - Associado</title>
</head>


<body>
    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 567px;" class="label-ficha">NOME</td>
            <td style="width: 100px;" class="label-ficha">DATA DE NASCIMENTO</td>
            <td style="width: 50px;" class="label-ficha">SEXO</td>
        </tr>
        <tr>
            <td style="width: 567px;" class="dados-ficha">{{$associado->nome}}</td>
            <td style="width: 100px;" class="dados-ficha">{{mrc_turn_data($associado->nascimento)}}</td>
            <td style="width: 50px;" class="dados-ficha">{{Str::upper($associado->sexo)}}</td>
        </tr>
    </table>

    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 300px;" class="label-ficha">RG (ÓRGÃO EMISSOR)</td>
            <td style="width: 150px;" class="label-ficha">CPF</td>
            <td style="width: 117px;" class="label-ficha">RAÇA / COR</td>
            <td style="width: 150px;" class="label-ficha">DATA DE FILIAÇÃO</td>
        </tr>
        <tr>
            <td style="width: 300px;" class="dados-ficha">{{$associado->rg}} {{$associado->rgorgaoemissor}}</td>
            <td style="width: 150px;" class="dados-ficha">{{$associado->cpf}}</td>
            <td style="width: 117px;" class="dados-ficha">{{Str::upper($associado->racacor)}}</td>
            <td style="width: 150px;" class="dados-ficha">{{mrc_turn_data($associado->filiacao)}}</td>
        </tr>
    </table>

    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 450px;" class="label-ficha">COMPANHIA</td>
            <td style="width: 117px;" class="label-ficha">ÁREAS DE ATUAÇÃO</td>
            <td style="width: 150px;" class="label-ficha">QTD. COLETADA(S)</td>
        </tr>
        <tr>
            <td style="width: 450px;" class="dados-ficha">{{$associado->companhia->nome}}</td>
            <td style="width: 117px;" class="dados-ficha"></td>
            <td style="width: 150px;" class="dados-ficha">{{$associado->quantidade}}</td>
        </tr>
    </table>


    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 450px;" class="label-ficha">ENDEREÇO</td>
            <td style="width: 50px;" class="label-ficha">Nº</td>
            <td style="width: 217px;" class="label-ficha">BAIRRO</td>
        </tr>
        <tr>
            <td style="width: 450px;" class="dados-ficha">{{$associado->endereco}}</td>
            <td style="width: 50px;" class="dados-ficha">{{$associado->numero}}</td>
            <td style="width: 217px;" class="dados-ficha">{{$associado->bairro->nome}}</td>
        </tr>
    </table>


    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 200px;" class="label-ficha">COMPLEMENTO</td>
            <td style="width: 200px;" class="label-ficha">MUNICÍPIO</td>
            <td style="width: 100px;" class="label-ficha">ZONA</td>
            <td style="width: 217px;" class="label-ficha">TELEFONE(S)</td>
        </tr>
        <tr>
            <td style="width: 200px;" class="dados-ficha">{{$associado->complemento}}</td>
            <td style="width: 200px;" class="dados-ficha">{{$associado->municipio->nome}}</td>
            <td style="width: 100px;" class="dados-ficha">{{Str::upper($associado->zona)}}</td>
            <td style="width: 217px;" class="dados-ficha">{{$associado->foneum}} ;  {{$associado->fonedois}}</td>
        </tr>
        <tr>
            <td colspan="4" style="width:717px;" class="close-ficha"></td>
        </tr>
    </table>

    <table style="width: 717px; border-collapse: collapse;">
        <tr>
            <td style="width: 717px;" class="label-ficha">ÁREAS DE ATUAÇÃO</td>
        </tr>
        <tr>
            <td style="width: 717px;" class="dados-ficha">
                @foreach ($associado->areas as $area)
                    {{$area->nome}};&nbsp;&nbsp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="4" style="width:717px;" class="close-ficha"></td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 200px;" class="dados-lista"><img src="{{ base_path().'/storage/app/public/'.$associado->imagem}}" width="100"/ ></td>
        </tr>
    </table>
</body>
</html>
