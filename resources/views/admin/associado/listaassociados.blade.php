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
            <th>Cidade</th>
            <th>Zona</th>
            <th>Telefone(s)</th>
            <th>Companhia</th>
            <th>Áreas de Atuação</th>
            <th>Imagem</th>
            {{--<th>FOTO</th>--}}
        </tr>
    </thead>
    <tbody>
        @foreach($associados as $associado)
             <tr>
                <td>{{$associado->id}}</td>
                <td>{{$associado->nome}}</td>
                <td>{{$associado->nascimento}}</td>
                <td>{{$associado->rg }} / {{$associado->rgorgaoemissor}}</td>
                <td>{{$associado->cpf}}</td>
                <td>{{$associado->sexo}}</td>
                <td>{{$associado->racacor}}</td>
                <td>{{$associado->filiacao }}</td>
                <td>{{$associado->quantidade}}</td>
                <td>{{$associado->endereco}}</td>
                <td>{{$associado->numero}}</td>
                <td>{{$associado->cidade}}</td>
                <td>{{$associado->zona}}</td>
                <td>{{$associado->foneum}} / {{$associado->fonedois}}</td>
                <td>{{$associado->companhia->nome}}</td>
                <td>@foreach($associado->bairros as $bairro) {{$bairro->nome}}; @endforeach </td>
                <td>{{$associado->imagem }}</td>
                {{-- <th><img src="{{ base_path().'/storage/app/public/'.$associado->imagem }}" width="40"></th> --}}
             </tr>
        @endforeach
    </tbody>
</table>
