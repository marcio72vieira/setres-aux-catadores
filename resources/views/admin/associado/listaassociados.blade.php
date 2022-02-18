<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Data Nascimento</th>
            <th>RG</th>
            <th>CPF</th>
            <th>Sexo</th>
            <th>Raça / Cor</th>
            <th>Data de Filiação</th>
            <th>Quantidade</th>
            <th>Endereço</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Municipio</th>
            <th>Zona</th>
            <th>Telefone(s)</th>
            <th>Companhia</th>
            <th>Áreas de Atuação</th>
            <th>Imagem</th>
            <th>QRcode</th>
            <th>Carteira</th>
            {{-- EXIBE A FOTO NA PLANILHA DO EXCEL <th>FOTO</th>--}}
        </tr>
    </thead>
    <tbody>
        @foreach($associados as $associado)
             <tr>
                <td>{{$associado->id}}</td>
                <td>{{$associado->nome}}</td>
                <td>{{mrc_turn_data($associado->nascimento)}}</td>
                <td>{{$associado->rg }} / {{$associado->rgorgaoemissor}}</td>
                <td>{{$associado->cpf}}</td>
                <td>{{$associado->sexo}}</td>
                <td>{{$associado->racacor}}</td>
                <td>{{mrc_turn_data($associado->filiacao)}}</td>
                <td>{{$associado->quantidade}}</td>
                <td>{{$associado->endereco}}</td>
                <td>{{$associado->numero}}</td>
                <td>{{$associado->complemento }}</td>
                <td>{{$associado->bairro->nome}}</td>
                <td>{{$associado->municipio->nome}}</td>
                <td>{{$associado->zona}}</td>
                <td>{{$associado->foneum}} / {{$associado->fonedois}}</td>
                <td>{{$associado->companhia->nome}}</td>
                <td>@foreach($associado->areas as $area) {{$area->nome}}; @endforeach </td>
                <td>{{$associado->imagem }}</td>
                <td>{{$associado->imagemqrcode }}</td>
                <td>{{$associado->idqrcode }}</td>
                {{-- EXIBE A FOTO NA PLANILHA DO EXCEL <th><img src="{{ base_path().'/storage/app/public/'.$associado->imagem }}" width="40"></th> --}}
             </tr>
        @endforeach
    </tbody>
</table>
