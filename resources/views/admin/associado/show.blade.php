@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h5>ASSOCIADO: {{$associado->nome}}</h5>
    </div>

    <div class="container">
    <form action="" method="" class="bg-light" style="padding: 10px; border:1px solid #000000">

        <div class="row">
            {{-- nome --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="nome" class="col-form-label"><strong>Nome</strong></label>
                    <input class="form-control" name="nome" type="text" value="{{$associado->nome}}" id="nome" readonly>
                </div>
                @error('nome')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- nascimento --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="nascimento" class="col-form-label"><strong>Data de Nascimento</strong></label>
                    <input class="form-control" name="nascimento" type="date" value="{{$associado->nascimento}}" id="nascimento" readonly>
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
                        <input class="form-check-input" type="radio" name="sexo" id="sexom" value="M" {{$associado->sexo=="M" ? 'checked': ''}} disabled>
                        <label class="form-check-label" for="sexom">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="sexof" value="F" {{$associado->sexo=="F" ? 'checked': ''}} disabled>
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
                    <input class="form-control" name="rg" type="text" value="{{$associado->rg}}" id="rg" readonly>
                </div>
                @error('rg')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- rgorgaoemissor --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="rgorgaoemissor" class="col-form-label"><strong>Orgão Emissor</strong></label>
                    <input class="form-control" name="rgorgaoemissor" type="text" value="{{$associado->rgorgaoemissor}}" id="rgorgaoemissor" readonly>
                </div>
                @error('rgorgaoemissor')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- cpf --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="cpf" class="col-form-label"><strong>CPF</strong></label>
                    <input class="form-control" name="cpf" type="text" value="{{$associado->cpf}}" id="cpf" readonly>
                </div>
                @error('cpf')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- racacor --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="racacor" class="col-form-label"><strong>Raça / Cor</strong></label>
                    <select name="racacor" id="racacor" class="form-control" disabled>
                        <option value="">Escolha ...</option>
                        <option value="branca" {{$associado->racacor == 'branca' ? 'selected' : ''}} >Branca</option>
                        <option value="preta" {{$associado->racacor == 'preta' ? 'selected' : ''}}>Preta</option>
                        <option value="parda" {{$associado->racacor == 'parda' ? 'selected' : ''}}>Parda</option>
                        <option value="amarela" {{$associado->racacor == 'amarela' ? 'selected' : ''}}>Amarela</option>
                        <option value="indigena" {{$associado->racacor == 'indigena' ? 'selected' : ''}}>Indígena</option>
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
                    <input class="form-control" name="filiacao" type="date" value="{{$associado->filiacao}}" id="filiacao" readonly>
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
                    <select name="companhia_id" id="companhia_id" class="form-control" disabled>
                        <option value="">Escolha uma Companhia / Associação ...</option>
                        @foreach($companhias  as $companhia)
                            <option value="{{$companhia->id}}" {{$associado->companhia_id == $companhia->id ? 'selected' : ''}}>{{$companhia->nome}}</option>
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
                    <select name="bairros[]" id="bairros" class="form-control" multiple disabled>
                        <option value="">Escolha a(s) área(s)...</option>
                        @foreach($bairros as $bairro)
                            <option value="{{$bairro->id}}" {{$associado->bairros->contains($bairro->id) ? 'selected' : ''}}>{{$bairro->nome}}</option>
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
                    <input class="form-control" name="quantidade" type="number" value="{{$associado->quantidade}}" id="quantidade" readonly>
                </div>
                @error('quantidade')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <hr style="margin-top: 50px; border: 2px solid #999797;">

        <h5>Enderço</h5>

        <div class="row">
            {{-- endereco --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="endereco" class="col-form-label"><strong>Rua; Av; Trav; etc...</strong></label>
                    <input class="form-control" name="endereco" type="text" value="{{$associado->endereco}}" id="endereco" readonly>
                </div>
                @error('endereco')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="numero" class="col-form-label"><strong>Número</strong></label>
                    <input class="form-control" name="numero" type="text" value="{{$associado->numero}}" id="numero" readonly>
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="bairro" class="col-form-label"><strong>Bairro</strong></label>
                    <input class="form-control" name="bairro" type="text" value="{{$associado->bairro}}" id="bairro" readonly>
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
                    <input class="form-control" name="complemento" type="text" value="{{$associado->complemento}}" id="complemento" readonly>
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="cidade" class="col-form-label"><strong>Cidade</strong></label>
                    <input class="form-control" name="cidade" type="text" value="{{$associado->cidade}}" id="cidade" readonly>
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
                        <input class="form-check-input" type="radio" name="zona" id="zonaurbana" value="urbana" {{$associado->zona =="urbana" ? 'checked': ''}} disabled>
                        <label class="form-check-label" for="zonaurbana">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="zona" id="zonarural" value="rural" {{$associado->zona =="rural" ? 'checked': ''}} disabled>
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
                    <input class="form-control" name="foneum" type="text" value="{{$associado->foneum}}" id="foneum" readonly>
                </div>
                @error('foneum')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>

            {{-- fonedois --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="fonedois" class="col-form-label"><strong>Telefone</strong></label>
                    <input class="form-control" name="fonedois" type="text" value="{{$associado->fonedois}}" id="fonedois" readonly>
                </div>
                @error('fonedois')
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div style="text-align: right; margin-top: 10px; margin-bottom: 10px">
            <a class="btn btn-primary" href="{{route('admin.associado.index')}}" role="button">Retornar</a>

        </div>
      </form>
    </div>
@endsection
