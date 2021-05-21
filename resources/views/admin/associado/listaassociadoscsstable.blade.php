<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>@</th>
            <th>@</th>
        </tr>
    </thead>
    <tbody>
        @foreach($associados as $associado)
             @php
                $pathimagem = str_replace("fotos/", "", $associado->imagem);
                $pathqrcode = str_replace("fotos/", "", $associado->imagemqrcode);
                $uppernome = mb_strtoupper($associado->nome);
            @endphp
             <tr>
                <td>{{$associado->id}}</td>
                <td>{{$uppernome}}</td>
                <td>{{$associado->cpf}}</td>
                <td>{{$pathimagem}}</td>
                <td>{{$pathqrcode}}</td>
             </tr>
        @endforeach
    </tbody>
</table>
