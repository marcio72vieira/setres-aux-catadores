@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>CADASTRAR RESÍDUO SÓLIDO</h2>

        <br><br>
        <form action="{{route('admin.residuo.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Resíduo</label>
                <input type="text" class="form-control" id="name" name="nome" value="{{old('nome')}}" required>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
              </div>

              <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
                <a class="btn btn-primary" href="{{route('admin.residuo.index')}}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>


    </div>

@endsection
