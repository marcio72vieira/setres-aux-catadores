<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>@</th>
        </tr>
    </thead>
    <tbody>
        @foreach($associados as $associado)
             @php $pathimagem = str_replace("fotos/", "", $associado->imagem); @endphp
             <tr>
                <td>{{$associado->id}}</td>
                <td>{{$associado->nome}}</td>
                <td>{{$associado->cpf}}</td>
                <td>{{$pathimagem}}</td>
             </tr>
        @endforeach
    </tbody>
</table>
