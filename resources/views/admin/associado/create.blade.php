@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h5>CADASTRAR ASSOCIADO</h5>
    </div>

    <div class="container">
    <form action="{{route('admin.associado.store')}}" method="POST" class="bg-light" style="padding: 10px; border:1px solid #000000">
        @csrf

        <div class="row">
            {{-- nome --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="nome" class="col-form-label"><strong>Nome</strong></label>
                    <input class="form-control" name="nome" type="text" value="{{old('nome')}}" id="nome">
                </div>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- nascimento --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="nascimento" class="col-form-label"><strong>Data de Nascimento</strong></label>
                    <input class="form-control" name="nascimento" type="date" value="{{old('nascimento')}}" id="nascimento">
                </div>
                @error('nascimento')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- sexo --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="sexo" class="col-form-label"><strong>Sexo</strong></label>
                    <br>
                    <div class="form-check form-check-inline" style="margin-top: 5px;">
                        <input class="form-check-input" type="radio" name="sexo" id="sexom" value="M" {{old('sexo')=="M" ? 'checked': ''}}>
                        <label class="form-check-label" for="sexom">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexof" value="F" {{old('sexo')=="F" ? 'checked': ''}}>
                        <label class="form-check-label" for="sexof">Feminino</label>
                    </div>
                </div>
                @error('sexo')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">

            {{-- rg --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="rg" class="col-form-label"><strong>RG</strong></label>
                    <input class="form-control" name="rg" type="text" value="{{old('rg')}}" id="rg">
                </div>
                @error('rg')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- rgorgaoemissor --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="rgorgaoemissor" class="col-form-label"><strong>Orgão Emissor</strong></label>
                    <input class="form-control" name="rgorgaoemissor" type="text" value="{{old('rgorgaoemissor')}}" id="rgorgaoemissor">
                </div>
                @error('rgorgaoemissor')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- cpf --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="cpf" class="col-form-label"><strong>CPF</strong></label>
                    <input class="form-control" name="cpf" type="text" value="{{old('cpf')}}" id="cpf">
                </div>
                @error('cpf')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- racacor --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="racacor" class="col-form-label"><strong>Raça / Cor</strong></label>
                    <select name="racacor" id="racacor" class="form-control">
                        <option value="" selected disabled>Escolha ...</option>
                        <option value="branca" {{old('racacor') == 'branca' ? 'selected' : ''}}>Branca</option>
                        <option value="preta" {{old('racacor') == 'preta' ? 'selected' : ''}}>Preta</option>
                        <option value="parda" {{old('racacor') == 'parda' ? 'selected' : ''}}>Parda</option>
                        <option value="amarela" {{old('racacor') == 'amarela' ? 'selected' : ''}}>Amarela</option>
                        <option value="indigena" {{old('racacor') == 'indigena' ? 'selected' : ''}}>Indígena</option>
                    </select>
                </div>
                @error('racacor')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>


            {{-- filiacao --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="filiacao" class="col-form-label"><strong>Data de Filiação</strong></label>
                    <input class="form-control" name="filiacao" type="date" value="{{old('filiacao')}}" id="filiacao">
                </div>
                @error('filiacao')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- companhia_id --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="companhia_id" class="col-form-label"><strong>Companhia / Associação</strong></label>
                    <select name="companhia_id" id="companhia_id" class="form-control">
                        <option value="" selected disabled>Escolha uma Companhia / Associação ...</option>
                        @foreach($companhias  as $companhia)
                            <option value="{{$companhia->id}}" {{old('companhia_id') == $companhia->id ? 'selected' : ''}}>{{$companhia->nome}}</option>
                        @endforeach
                    </select>
                </div>
                @error('companhia_id')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- bairros --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="bairros" class="col-form-label"><strong>Área de Atuação</strong></label>
                    <select name="bairros[]" id="bairros" class="form-control" multiple>
                        <option value="" disabled>Escolha a(s) área(s)...</option>
                        @foreach($bairros  as $bairro)
                            <option value="{{$bairro->id}}"
                                @if(old('bairros'))
                                    {{in_array($bairro->id, old('bairros')) ? 'selected' : ''}}
                                @endif
                            >{{$bairro->nome}}</option>
                        @endforeach
                    </select>
                </div>
                @error('bairros')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- quantidade --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="quantidade" class="col-form-label"><strong>kg</strong></label>
                    <input class="form-control" name="quantidade" type="number" value="{{old('quantidade')}}" id="quantidade">
                </div>
                @error('quantidade')
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
                    <input class="form-control" name="endereco" type="text" value="{{old('endereco')}}" id="endereco">
                </div>
                @error('endereco')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="numero" class="col-form-label"><strong>Número</strong></label>
                    <input class="form-control" name="numero" type="text" value="{{old('numero')}}" id="numero">
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="bairro" class="col-form-label"><strong>Bairro</strong></label>
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
                    <label for="complemento" class="col-form-label"><strong>Complemento</strong></label>
                    <input class="form-control" name="complemento" type="text" value="{{old('complemento')}}" id="complemento">
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cidade" class="col-form-label"><strong>Cidade</strong></label>
                    <input class="form-control" name="cidade" type="text" value="{{old('cidade')}}" id="cidade">
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
                        <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona')=="urbana" ? 'checked': ''}}>
                        <label class="form-check-label" for="zonaurbana">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona')=="rural" ? 'checked': ''}}>
                        <label class="form-check-label" for="zonarural">Rural</label>
                    </div>
                </div>
                @error('zona')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            {{-- foneum --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="foneum" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="foneum" type="text" value="{{old('foneum')}}" id="foneum">
                </div>
                @error('foneum')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonedois --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="fonedois" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="fonedois" type="text" value="{{old('fonedois')}}" id="fonedois">
                </div>
                @error('fonedois')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
            <a class="btn btn-primary" href="{{route('admin.associado.index')}}" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>












@endsection
