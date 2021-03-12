@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>CADASTRO DE RESÍDUOS SÓLIDOS</h2>

        <br><br>
        <form action="{{route('admin.residuo.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Resíduo</label>
                <input type="text" class="form-control" id="name" name="nome" value="{{old('nome')}}">
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
              </div>

              <br><br><br>
              <a class="btn btn-primary" href="{{route('admin.residuo.index')}}" role="button">Cancelar</a>
              <button type="submit" class="btn btn-primary">Submit</button>

        </form>


    </div>

@endsection
