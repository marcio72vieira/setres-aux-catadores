@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>CADASTRAR BAIRROS</h2>

        <br><br>
        <form action="{{route('admin.bairro.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Bairro</label>
                <input type="text" class="form-control" id="name" name="nome" value="{{old('nome')}}" required>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
              </div>

              <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
                <a class="btn btn-primary" href="{{route('admin.bairro.index')}}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>


    </div>

@endsection
