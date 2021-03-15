@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h5>COMPANHIA: {{$companhia->nome}}</h5>
    </div>

    <div class="container">
    <form class="bg-light" style="padding: 10px; border:1px solid #000000">
        @csrf

        <div class="row">
            {{-- nome --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="nome" class="col-form-label"><strong>Nome</strong></label>
                    <input class="form-control" name="nome" type="text" value="{{$companhia->nome}}" id="nome" readonly>
                </div>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- cnpj --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cnpj" class="col-form-label"><strong>CNPJ</strong></label>
                    <input class="form-control" name="cnpj" type="text" value="{{$companhia->cnpj}}" id="cnpj" readonly>
                </div>
                @error('cnpj')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>


            {{-- fundacao --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="fundacao" class="col-form-label"><strong>Fundação</strong></label>
                    <input class="form-control" name="fundacao" type="date" value="{{$companhia->fundacao}}" id="fundacao" readonly>
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
                    <label for="foneum" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="foneum" type="text" value="{{$companhia->foneum}}" id="foneum" readonly>
                </div>
                @error('foneum')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonedois --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="fonedois" class="col-form-label"><strong>Telefone (opcional)</strong></label>
                    <input class="form-control" name="fonedois" type="text" value="{{$companhia->fonedois}}" id="fonedois" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- presidente --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="presidente" class="col-form-label"><strong>Presidente</strong></label>
                    <input class="form-control" name="presidente" type="text" value="{{$companhia->presidente}}" id="presidente" readonly>
                </div>
                @error('presidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="fonepresidente" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="fonepresidente" type="text" value="{{$companhia->fonepresidente}}" id="fonepresidente" readonly>
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
                    <label for="vicepresidente" class="col-form-label"><strong>Vice-presidente</strong></label>
                    <input class="form-control" name="vicepresidente" type="text" value="{{$companhia->vicepresidente}}" id="vicepresidente" readonly>
                </div>
                @error('vicepresidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonevicepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="fonevicepresidente" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="fonevicepresidente" type="text" value="{{$companhia->fonevicepresidente}}" id="fonevicepresidente" readonly>
                </div>
                @error('fonevicepresidente')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <hr style="margin-top: 50px; border: 5px solid green;">

        <h5>Enderço</h5>

        <div class="row">
            {{-- endereco --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="endereco" class="col-form-label"><strong>Rua; Av; Trav; etc...</strong></label>
                    <input class="form-control" name="endereco" type="text" value="{{$companhia->endereco}}" id="endereco" readonly>
                </div>
                @error('endereco')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="numero" class="col-form-label"><strong>Número</strong></label>
                    <input class="form-control" name="numero" type="text" value="{{$companhia->numero}}" id="numero" readonly>
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="bairro" class="col-form-label"><strong>Bairro</strong></label>
                    <input class="form-control" name="bairro" type="text" value="{{$companhia->bairro}}" id="bairro" readonly>
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
                    <label for="complemento" class="col-form-label"><strong>Complemento</strong></label>
                    <input class="form-control" name="complemento" type="text" value="{{$companhia->complemento}}" id="complemento" readonly>
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cidade" class="col-form-label"><strong>Cidade</strong></label>
                    <input class="form-control" name="cidade" type="text" value="{{$companhia->cidade}}" id="cidade" readonly>
                </div>
                @error('cidade')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- zona --}}
            <div class="col-5 align-self-end">
                <div class="form-group">
                    <label for="zona" class="col-form-label" style="margin-top: 5px"><strong>Zona</strong></label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonaurbana" {{$companhia->zona == 'urbana' ? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="zonarural">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonarural" {{$companhia->zona == 'rural' ? 'checked' : ''}} disabled>
                        <label class="form-check-label" for="zonaurbana">Rural</label>
                    </div>
                </div>
                @error('zona')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
            <a class="btn btn-primary" href="{{route('admin.companhia.index')}}" role="button">Retornar</a>
        </div>
      </form>
    </div>












@endsection
