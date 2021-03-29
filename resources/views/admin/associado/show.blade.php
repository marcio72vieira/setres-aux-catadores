@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gerenciar / Associado / Editar</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Associados: {{$associado->nome}}
                    </h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{route('admin.associado.update', $associado->id)}}" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <div class="pl-lg-4">
                            <div class="row">
                                {{-- nome --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome</label>
                                        <input type="text" id="nome" class="form-control" name="nome" value="{{$associado->nome}}" readonly>
                                    </div>
                                </div>

                                {{-- nascimento --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nascimento">Data de Nascimento</label>
                                        <input type="date" id="nascimento" class="form-control" name="nascimento" value="{{old('nascimento', $associado->nascimento)}}" readonly>
                                    </div>
                                </div>

                                {{-- sexo --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="sexo">Sexo</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexom" value="m" {{old('sexo', $associado->sexo) == 'm' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="sexom">Masculino</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="sexof" value="f" {{old('sexo', $associado->sexo) == 'f' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="sexof">Feminino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- rg --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rg">RG</label>
                                        <input type="text" id="rg" class="form-control" name="rg" value="{{old('rg', $associado->rg)}}" readonly>
                                    </div>
                                </div>

                                {{-- rgorgaoemissor --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="rgorgaoemissor">Orgão Emissor</label>
                                        <input type="text" id="rgorgaoemissor" class="form-control" name="rgorgaoemissor" value="{{old('rgorgaoemissor', $associado->rgorgaoemissor)}}" readonly>
                                    </div>
                                </div>

                                {{-- cpf --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cpf">CPF</label>
                                        <input type="text" id="cpf" class="form-control" name="cpf" value="{{old('cpf', $associado->cpf)}}" readonly>
                                    </div>
                                </div>

                                {{-- racacor --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="racacor">Raça / Cor</label>
                                        <select name="racacor" id="racacor" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            <option value="branca" {{old('racacor', $associado->racacor) == 'branca' ? 'selected' : ''}}>Branca</option>
                                            <option value="preta" {{old('racacor', $associado->racacor) == 'preta' ? 'selected' : ''}}>Preta</option>
                                            <option value="parda" {{old('racacor', $associado->racacor) == 'parda' ? 'selected' : ''}}>Parda</option>
                                            <option value="amarela" {{old('racacor', $associado->racacor) == 'amarela' ? 'selected' : ''}}>Amarela</option>
                                            <option value="indigena" {{old('racacor', $associado->racacor) == 'indigena' ? 'selected' : ''}}>Indígena</option>
                                        </select>
                                        @error('racacor')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- filiacao --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="filiacao">Data de filiacao</label>
                                        <input type="date" id="filiacao" class="form-control" name="filiacao" value="{{old('filiacao', $associado->filiacao)}}" readonly>
                                        @error('filiacao')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- companhia_id --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="companhia_id">Companhia / Associação</label>
                                        <select name="companhia_id" id="companhia_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha uma Companhia / Associação ...</option>
                                            @foreach($companhias  as $companhia)
                                                <option value="{{$companhia->id}}" {{old('companhia_id', $associado->companhia_id) == $companhia->id ? 'selected' : ''}}>{{$companhia->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('companhia_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- bairros --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairros">Área de Atuação</label>
                                        <select name="bairros[]" id="bairros" class="form-control" multiple disabled>
                                            <option value="" disabled>Escolha o(s) Bairro(s) onde atua...</option>
                                            @foreach($bairros  as $bairro)
                                                <option value="{{$bairro->id}}"
                                                    @if(old('bairros'))
                                                        {{in_array($bairro->id, old('bairros')) ? 'selected' : ''}}
                                                    @else
                                                        {{$associado->bairros->contains($bairro->id) ? 'selected' : ''}}
                                                    @endif
                                                >{{$bairro->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('bairros')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- quantidade --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quantidade">Qtd. média Coletada (Kg)</label>
                                        <input type="number" id="quantidade" class="form-control" name="quantidade" value="{{old('quantidade', $associado->quantidade)}}" readonly>
                                        @error('quantidade')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Endereço</h5>

                            <div class="row">
                                {{-- endereco --}}
                                <div class="col-lg-7">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="endereco">Rua; Av; Travessa, etc...</label>
                                        <input type="text" id="endereco" class="form-control" name="endereco" value="{{old('endereco', $associado->endereco)}}" readonly>
                                        @error('endereco')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- numero --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="numero">Número</label>
                                        <input type="text" id="numero" class="form-control" name="numero" value="{{old('numero', $associado->numero)}}" readonly>
                                        @error('numero')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- bairro --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro">Bairro</label>
                                        <input type="text" id="bairro" class="form-control" name="bairro" value="{{old('bairro', $associado->bairro)}}" readonly>
                                        @error('bairro')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- complemento --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="complemento">Complemento</label>
                                        <input type="text" id="complemento" class="form-control" name="complemento" value="{{old('complemento', $associado->complemento)}}" readonly>
                                        @error('complemento')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- cidade --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="cidade">Cidade</label>
                                        <input type="text" id="cidade" class="form-control" name="cidade" value="{{old('cidade', $associado->cidade)}}" readonly>
                                        @error('cidade')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- zona --}}
                                <div class="col-lg-5">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="zona" style="margin-top: 5px">Zona</label>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona', $associado->zona) == 'urbana' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonaurbana">Urbana</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona', $associado->zona) == 'rural' ? 'checked' : ''}} disabled>
                                            <label class="form-check-label" for="zonarural">Rural</label>
                                        </div>
                                        @error('zona')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- foneum --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="foneum">Telefone 1</label>
                                        <input type="text" id="foneum" class="form-control" name="foneum" placeholder="(99) 9999-9999" value="{{old('foneum', $associado->foneum)}}" readonly>
                                        @error('foneum')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- fonedois --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fonedois">Telefone 2 (opcional)</label>
                                        <input type="text" id="fonedois" class="form-control" name="fonedois"  placeholder="(99) 9999-9999" value="{{old('fonedois', $associado->fonedois)}}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-5" style="text-align: center">
                                    <img src="{{$associado->imagem}}" width="200" height="150">
                                </div>
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a class="btn btn-primary" href="{{route('admin.associado.index')}}" role="button">
                                        <i class="fas fa-undo-alt"></i>
                                        Retornar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
