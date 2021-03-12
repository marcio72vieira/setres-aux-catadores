@extends('admin.layoutmaster')

@section('conteudo-principal')

    <div class="container">
        <h2>LISTA DE ASSOCIAÇÕES / COMPANHIAS / COOPERATIVAS</h2>
    </div>

    <div class="container">
    <form>
        <div class="row">
            {{-- nome --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Nome</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- cnpj --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">CNPJ</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- fundacao --}}
            <div class="col-2">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Fundação</label>
                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- foneum --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Telefone</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- fonedois --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Telefone (opcional)</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- presidente --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Presidente</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- telefonepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Telefone</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>
        </div>

        <div class="row">
            {{-- vicepresidente --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Vice-Presidente</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- fonevicepresidente --}}
            <div class="col-5">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Telefone</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>
        </div>

        <hr>
        <h5>Enderço</h5>

        <div class="row">
            {{-- endereco --}}
            <div class="col-7">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Rua /Avenida / Travessa...</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- numero --}}
            <div class="col-1">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Número</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- bairro --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Bairro</label>
                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
            </div>
        </div>


        <div class="row">
            {{-- complemento --}}
            <div class="col-4">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Complemento</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- cidade --}}
            <div class="col-3">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Cidade</label>
                    <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                </div>
            </div>

            {{-- zona --}}
            <div class="col-5 align-self-end">
                <div class="form-group">
                    <label for="example-text-input" class="col-form-label" style="margin-top: 5px">Zona</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="opcao1">
                        <label class="form-check-label" for="inlineRadio1">Urbana</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="opcao1">
                        <label class="form-check-label" for="inlineRadio1">Rural</label>
                    </div>
                </div>
            </div>
        </div>


        <br><br><br>
        <a class="btn btn-primary" href="{{route('admin.residuo.index')}}" role="button">Cancelar</a>
        <button type="submit" class="btn btn-primary">Submit</button>


      </form>
    </div>












@endsection
