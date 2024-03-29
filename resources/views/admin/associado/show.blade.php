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
                                {{-- tipo --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="tipo">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            <option value="associado" {{old('tipo', $associado->tipo) == 'associado' ? 'selected' : ''}}>Associado</option>
                                            <option value="cooperado" {{old('tipo', $associado->tipo) == 'cooperado' ? 'selected' : ''}}>Cooperado</option>
                                            <option value="avulso" {{old('tipo', $associado->tipo) == 'avulso' ? 'selected' : ''}}>Avulso</option>
                                            <option value="informal" {{old('tipo', $associado->tipo) == 'informal' ? 'selected' : ''}}>Informal</option>
                                            <option value="indefinido" {{old('tipo', $associado->tipo) == 'indefinido' ? 'selected' : ''}}>Indefinido</option>
                                        </select>
                                        @error('tipo')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- companhia_id --}}
                                <div class="col-lg-5">
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

                                {{-- areas --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="areas">Área de Atuação</label>
                                        <select name="areas[]" id="areas" class="form-control" multiple disabled>
                                            <option value="" disabled>Escolha a(s) area(s)...</option>
                                            @foreach($areas  as $area)
                                                <option value="{{$area->id}}"
                                                    @if(old('areas'))
                                                        {{in_array($area->id, old('areas')) ? 'selected' : ''}}
                                                    @else
                                                        {{$associado->areas->contains($area->id) ? 'selected' : ''}}
                                                    @endif
                                                >{{$area->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('areas')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- quantidade --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="quantidade">Qtd. Coletada (Kg)</label>
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


                                {{-- bairro_id --}}
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="bairro_id">Bairro</label>
                                        <select name="bairro_id" id="bairro_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($bairros  as $bairro)
                                                <option value="{{$bairro->id}}" {{old('bairro_id', $associado->bairro_id) == $bairro->id ? 'selected' : ''}}>{{$bairro->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('bairro_id')
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


                                {{-- municipio_id --}}
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="municipio_id">Município</label>
                                        <select name="municipio_id" id="municipio_id" class="form-control" disabled>
                                            <option value="" selected disabled>Escolha ...</option>
                                            @foreach($municipios  as $municipio)
                                                <option value="{{$municipio->id}}" {{old('municipio_id', $associado->municipio_id) == $municipio->id ? 'selected' : ''}}>{{$municipio->nome}}</option>
                                            @endforeach
                                        </select>
                                        @error('municipio_id')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                {{-- zona --}}
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="zona" style="margin-top: 5px">Zona</label>
                                        <br>
                                        @if($associado->zona == 'urbana')
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{old('zona', $associado->zona) == 'urbana' ? 'checked' : ''}} disabled>
                                                <label class="form-check-label" for="zonaurbana">Urbana</label>
                                            </div>
                                        @else
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{old('zona', $associado->zona) == 'rural' ? 'checked' : ''}} disabled>
                                                <label class="form-check-label" for="zonarural">Rural</label>
                                            </div>
                                        @endif
                                        @error('zona')
                                            <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>


                                {{-- carteiraemitida --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="carteiraemitida">Carteira Emitida ?</label>
                                        <div style="margin-top: 5px">
                                            @if($associado->carteiraemitida == 1)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="carteiraemitida" id="carteiraemitidasim" value="1" {{old('carteiraemitida', $associado->carteiraemitida) == '1' ? 'checked' : ''}} disabled>
                                                    <label class="form-check-label" for="carteiraemitidasim">Sim</label>
                                                </div>
                                            @else
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="carteiraemitida" id="carteiraemitidanao" value="0" {{old('carteiraemitida', $associado->carteiraemitida) == '0' ? 'checked' : ''}} disabled>
                                                    <label class="form-check-label" for="carteiraemitidanao">Não</label>
                                                </div>
                                            @endif
                                            @error('carteiraemitida')
                                                <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                {{-- carteiravalidade --}}
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="carteiravalidade">Data de Validade<span class="small text-danger">*</span></label>
                                        <input type="date" id="carteiravalidade" class="form-control" name="carteiravalidade" value="{{old('carteiravalidade', $associado->carteiravalidade)}}" readonly>
                                        @error('carteiravalidade')
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
                                    <h6><strong>Tempo de associado: {{mrc_calc_time($associado->filiacao)}}</strong></h6>
                                </div>

                                <div class="offset-lg-1 col-lg-2" style="margin-top: 15px">
                                    {{-- <img src="{{$associado->imagem}}" width="200" height="150"> modo anterior com dados binários--}}
                                    <img src="{{ asset('storage/'.$associado->imagem) }}" width="200">
                                </div>

                                <div class="col-lg-2" style="text-align: right">
                                    {{-- @php $imgqrcode = str_replace('coletor', 'coletorQR', $associado->imagem) @endphp --}}
                                    <img src="{{ asset('storage/'.$associado->imagemqrcode) }}" width="200">
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
