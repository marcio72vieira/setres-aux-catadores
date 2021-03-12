@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>Cadastro de Companhias</h2>
    </div>

    <div class="container">
    <form action="{{route('admin.companhia.store')}}" method="POST">
        @csrf

        <div class="row">
            {{-- nome --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="nome" class="col-form-label">Nome</label>
                    <input class="form-control" name="nome" type="text" value="{{old('nome')}}" id="nome">
                </div>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- cnpj --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cnpj" class="col-form-label">CNPJ</label>
                    <input class="form-control" name="cnpj" type="text" value="{{old('cnpj')}}" id="cnpj">
                </div>
                @error('cnpj')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>


            {{-- fundacao --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="fundacao" class="col-form-label">Fundação</label>
                    <input class="form-control" name="fundacao" type="date" value="{{old('fundacao')}}" id="fundacao">
                </div>
                @error('fundacao')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- foneum --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="foneum" class="col-form-label">Telefone</label>
                    <input class="form-control" name="foneum" type="text" value="{{old('foneum')}}" id="foneum">
                </div>
                @error('foneum')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonedois --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="fonedois" class="col-form-label">Telefone (opcional)</label>
                    <input class="form-control" name="fonedois" type="text" value="{{old('fonedois')}}" id="fonedois">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- presidente --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="presidente" class="col-form-label">Presidente</label>
                    <input class="form-control" name="presidente" type="text" value="{{old('presidente')}}" id="presidente">
                </div>
                @error('presidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="fonepresidente" class="col-form-label">Telefone</label>
                    <input class="form-control" name="fonepresidente" type="text" value="{{old('fonepresidente')}}" id="fonepresidente">
                </div>
                @error('fonepresidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- vicepresidente --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="vicepresidente" class="col-form-label">Vice-presidente</label>
                    <input class="form-control" name="vicepresidente" type="text" value="{{old('vicepresidente')}}" id="vicepresidente">
                </div>
                @error('vicepresidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonevicepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="fonevicepresidente" class="col-form-label">Telefone</label>
                    <input class="form-control" name="fonevicepresidente" type="text" value="{{old('fonevicepresidente')}}" id="fonevicepresidente">
                </div>
                @error('fonevicepresidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <hr style="margin-top: 50px;">

        <h5>Enderço</h5>

        <div class="row">
            {{-- endereco --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="endereco" class="col-form-label">Rua; Av; Trav; etc...</label>
                    <input class="form-control" name="endereco" type="text" value="{{old('endereco')}}" id="endereco">
                </div>
                @error('endereco')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="numero" class="col-form-label">Número</label>
                    <input class="form-control" name="numero" type="text" value="{{old('numero')}}" id="numero">
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="bairro" class="col-form-label">Bairro</label>
                    <input class="form-control" name="bairro" type="text" value="{{old('bairro')}}" id="bairro">
                </div>
                @error('bairro')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>


        <div class="row">
            {{-- complemento --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="complemento" class="col-form-label">Complemento</label>
                    <input class="form-control" name="complemento" type="text" value="{{old('complemento')}}" id="complemento">
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cidade" class="col-form-label">Cidade</label>
                    <input class="form-control" name="cidade" type="text" value="{{old('cidade')}}" id="cidade">
                </div>
                @error('cidade')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- zona --}}
            <div class="col-5 align-self-end">
                <div class="form-group">
                    <label for="zona" class="col-form-label" style="margin-top: 5px">Zona</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona')=="rural" ? 'checked=': ''}}>
                        <label class="form-check-label" for="zonarural">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona')=="urbana" ? 'checked=': ''}}>
                        <label class="form-check-label" for="zonaurbana">Rural</label>
                    </div>
                </div>
                @error('zona')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>


        <br><br><br>
        <a class="btn btn-primary" href="{{route('admin.companhia.index')}}" role="button">Cancelar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>












@endsection
