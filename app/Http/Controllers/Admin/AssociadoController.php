<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AssociadoRequest;
use App\Http\Requests\AssociadoUpdateRequest;
use App\Models\Companhia;
use App\Models\Area;
use App\Models\Bairro;
use App\Models\Municipio;
use App\Models\Associado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Exports\AssociadoExport;
use App\Exports\AssociadoExportDois;
use App\Exports\AssociadoExportCssTable;
use Illuminate\Support\Facades\Gate;
use Excel;

use Illuminate\Support\Facades\Validator;   //Validação unique para cnpj na atualização
use Illuminate\Validation\Rule;             //Validação unique para cnpm na atualização

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use Illuminate\Support\Collection;
use Illuminate\Database\Query\JoinClause;

use File;
use ZipArchive;


class AssociadoController extends Controller
{

    public function index()
    {
        /*
        // Com a chamada do método: ajaxgetAssociados(Request $request) abaixo, não há a necessidade de passar nenhum parâmetro (compact('associados')) para a view, apenas a sua renderização.
        // Se ADMINISTRADOR, visualiza todos os ASSOCIADOS, caso contrário, OPERADOR, só os do seu município
        if(Auth::user()->perfil == 'adm'){
            $associados = Associado::orderBy('nome', 'ASC')->get();
        } else {
            $associados = Associado::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
        }
        return view('admin.associado.index', compact('associados'));
        */

        return view('admin.associado.index');
    }


    ////// Início - Ajax para datatable com paginação dinâmica
    /*
        AJAX request.
        Este método é executado automaticamente pela linha: ajax: "{{route('admin.ajaxgetRestaurantes')}}", que se encontra no script da view: admin.restaurantes.index
    */
    public function ajaxgetAssociados(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        /***********************************************************************************************************
        // RECUPERAÇÃO DE REGISTROS FEITO ATRAVÉS DO ELOQUENTE E SEUS RELACIONAMENTOS DIRETOS (TOTALMENTE FUNCIONAL)
        // Total records
        $totalRecords = Restaurante::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Restaurante::select('count(*) as allcount')->where('identificacao', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $restaurantes = Restaurante::orderBy($columnName,$columnSortOrder)
        ->where('restaurantes.identificacao', 'like', '%' .$searchValue . '%')
        ->select('restaurantes.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();

        foreach($restaurantes as $restaurante){
            // campos a serem exibidos
            $id = $restaurante->id;
            $municipio = $restaurante->municipio->nome;
            $identificacao = $restaurante->identificacao;
            $responsaveis = "<span style='font-size: 10px; color: blue'>SEDES: </span>".$restaurante->user->nomecompleto." / ". $restaurante->user->telefone." / ".$restaurante->user->email."<br> <span style='font-size: 10px; color: blue'>EMPRESA: </span>".$restaurante->nutricionista->nomecompleto." / ". $restaurante->nutricionista->telefone." / ".$restaurante->nutricionista->email;
            $compras = $restaurante->qtdcomprasvinc($restaurante->id);
            $ativo = ($restaurante->ativo == 1) ? "<b><i class='fas fa-check text-success mr-2'></i></b>" : "<b><i class='fas fa-times  text-danger mr-2'></i></b>";


            // ações
            $actionShow = "<a href='".route('admin.restaurante.show', $id)."' title='exibir'><i class='fas fa-eye text-warning mr-2'></i></a>";
            $actionEdit = "<a href='".route('admin.restaurante.edit', $id)."' title='editar'><i class='fas fa-edit text-info mr-2'></i></a>";
            // verifica se o restaurante possui compras vinculadas para não possibilitar sua exclusão acidental
            if($restaurante->qtdcomprasvinc($restaurante->id) == 0){
                $actionDelete = "<a href='' class='deleterestaurante' data-idrestaurante='".$id."' data-identificacaorestaurante='".$identificacao."'  data-toggle='modal' data-target='#formDelete' title='excluir'><i class='fas fa-trash text-danger mr-2'></i></a>";
            }else{
                $actionDelete = "<a title='há compras vinculadas!'><i class='fas fa-trash text-secondary mr-2'></i></a>";
            }


            $actions = $actionShow. " ".$actionEdit. " ".$actionDelete;

            $data_arr[] = array(
                "id" => $id,
                "municipio" => $municipio,
                "identificacao" => $identificacao,
                "responsaveis" => $responsaveis,
                "compras" => $compras,
                "ativo" => $ativo,
                "actions" => $actions,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
        ***********************************************************************************************************/


        // Total records.
        // Obs: Como serão realizadas pesquisas apenas nos campos "nome e companhia" penso que não há a necessidade
        //      de utilizarmos os joins: ->join('users', ....) e  ->join('nutricionistas', ...) mas, em todo caso...!!!,
        // Obs: https://www.pakainfo.com/group_concat-in-laravel-eloquent-raw/
        // Obs: Substituir a configuração de conexão do mysql no arquivo config/database a propriedade: 'strict' => true para 'strict' => false, para o "group by" funcionar.
        // Obs: DB::raw('GROUP_CONCAT(areas.nome SEPARATOR ", ") as areasDEatuacao')) juntamente com groupBy('associado.id), Agrupa em uma única coluna, todas as ocorrências das
        //      áreas de atuação de um associado, separadas por uma vírgula.
        // Obs: Ver documenteção do Laravel o item: Advanced Join Clauses.
        // Se o usuário é ADM ver todos os registros de Associados, caso contrário vê apenas os registros dos Associados, ligados às companhias cadastradas pelo usuário Operador, que
        // naturalmente, só pode cadastrar Companhias do município do quel o mesmo faz parte, exemplo, Um usuário operador de São Jose de Ribamar, só pode cadastrar Companhias de São José
        // de Ribamar e naturalmente, só poederá ver os Associados vinculados à estas Companhias.
        // ACESSANDO TODOS OS REGISTROS DE ASSOCIADOS
        if(Auth::user()->perfil == 'adm'){
            $totalRecords = Associado::select('count(*) as allcount')->count();
            $totalRecordswithFilter = DB::table('associados')
                ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
                ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
                ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
                ->where('associados.nome', 'like', '%' .$searchValue . '%')
                ->orWhere('associados.tipo', 'like', '%' . $searchValue . '%' )
                ->orWhere('companhias.nome', 'like', '%' . $searchValue . '%' )
                ->count();

            // Fetch records (associados)
            $associados = DB::table('associados')
                ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
                ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
                ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
                ->join('area_associado', 'area_associado.associado_id', '=', 'associados.id')
                ->join('areas', 'areas.id', '=', 'area_associado.area_id')
                ->select('associados.id', 'associados.imagem', 'associados.nome', 'associados.carteiraemitida', 'associados.carteiravalidade', 'associados.foneum', 'associados.fonedois', 'associados.tipo',
                    'companhias.nome AS companhia',
                    'areas.nome AS areas', DB::raw('GROUP_CONCAT(areas.nome SEPARATOR ", ") as areasDEatuacao'))
                ->groupBy('associados.id')
                ->where('associados.nome', 'like', '%' .$searchValue . '%')
                ->orWhere('associados.tipo', 'like', '%' .$searchValue . '%')
                ->orWhere('companhias.nome', 'like', '%' .$searchValue . '%')
                ->orderBy($columnName,$columnSortOrder)
                ->skip($start)
                ->take($rowperpage)
                ->get();
        // ACESSANDO SÓ OS REGISTROS DE ASSOCIADOS DAS COMPANHIAS CADASTRADAS PELO USUÁRIO LOGADO COMO OPERADOR
        } else {
            $totalRecords = Associado::select('count(*) as allcount')->count();
            $totalRecordswithFilter = DB::table('associados')
                ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
                ->join('companhias', function (JoinClause $join) {
                    $join->on('companhias.id', '=', 'associados.companhia_id')
                    ->where('companhias.municipio_id', '=', Auth::user()->municipio_id);
                })
                ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
                //->join('area_associado', 'area_associado.associado_id', '=', 'associados.id') // Não há a necessidade, pois não se relaciona com a tabela associados. Este join, retorna a contagem de registros e sua paginação errados.
                //->join('areas', 'areas.id', '=', 'area_associado.area_id')                    // Não há a necessidade, pois não se relaciona com a tabela associados. Este join, retorna a contagem de registros e sua paginação errados.
                //->select('count(*) as allcount')
                ->where('associados.nome', 'like', '%' .$searchValue . '%')
                ->orWhere('associados.tipo', 'like', '%' . $searchValue . '%' )
                ->orWhere('companhias.nome', 'like', '%' . $searchValue . '%' )
                ->count();

            // Fetch records (associados)
            $associados = DB::table('associados')
                ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
                ->join('companhias', function (JoinClause $join) {
                    $join->on('companhias.id', '=', 'associados.companhia_id') //->where('associados.companhia_id', '=', 13); //->where('associados.municipio_id', '=', Auth::user()->municipio_id);
                    ->where('companhias.municipio_id', '=', Auth::user()->municipio_id);
                })
                ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
                ->join('area_associado', 'area_associado.associado_id', '=', 'associados.id')
                ->join('areas', 'areas.id', '=', 'area_associado.area_id')
                ->select('associados.id', 'associados.imagem', 'associados.nome', 'associados.carteiraemitida', 'associados.carteiravalidade', 'associados.foneum', 'associados.fonedois', 'associados.tipo',
                    'companhias.nome AS companhia',
                    'areas.nome AS areas', DB::raw('GROUP_CONCAT(areas.nome SEPARATOR ", ") as areasDEatuacao'))
                ->groupBy('associados.id')
                ->where('associados.nome', 'like', '%' .$searchValue . '%')
                ->orWhere('associados.tipo', 'like', '%' .$searchValue . '%')
                ->orWhere('companhias.nome', 'like', '%' .$searchValue . '%')
                ->orderBy($columnName,$columnSortOrder)
                ->skip($start)
                ->take($rowperpage)
                ->get();
        }


        $data_arr = array();

        foreach($associados as $associado){
            // campos a serem exibidos
            $id = $associado->id;
            $foto = $associado->imagem != "" ? asset('/storage/'.$associado->imagem) : "";
            $emitida = $associado->carteiraemitida == 1 ? mrc_turn_data($associado->carteiravalidade)." <b><i class='fas fa-check text-success mr-2' style='font-size:15px'></i></b>" : "";
            $nome = $associado->nome;
            $telefones = $associado->foneum . " / " . $associado->fonedois;
            $tipo = $associado->tipo;
            $companhia = $associado->companhia;
            $area = $associado->areasDEatuacao;
            // $area = $associado->areas; Utilizar este, sem a função , DB::raw('GROUP_CONCAT(areas.nome SEPARATOR ", ") as areasDEatuacao')) ->groupBy('associados.id')


            // ações
            $actionShow = "<a href='".route('admin.associado.show', $id)."' title='exibir'><i class='fas fa-eye text-warning mr-2'></i></a>";
            $actionEdit = "<a href='".route('admin.associado.edit', $id)."' title='editar'><i class='fas fa-edit text-info mr-2'></i></a>";
            $actionRetrato = "<a href='".route('admin.associado.retrato', $id)."' title='foto'><i class='fas fa-portrait text-primary mr-2'></i></a>";
            $actionFicha = "<a href='".route('admin.associado.ficha', $id)."' title='ficha' target='_blank'><i class='fas fa-file-pdf text-danger mr-2'></i></a>";
            $actionDelete = "<a href='' class='deleteassociado' data-idassociado='".$id."' data-nomeassociado='".$nome."'  data-toggle='modal' data-target='#formDelete' title='excluir'><i class='fas fa-trash text-danger mr-2'></i></a>";

            $actions = $actionShow. " ".$actionEdit. " ".$actionRetrato. " ".$actionFicha. " ".$actionDelete;

            $data_arr[] = array(
                "id" => $id,
                "foto" => '<img src="'. $foto .'" width="40" style="margin-left:7px">',
                "nome" => $nome."<br>".$emitida,
                "telefones" => $telefones,
                "tipo" => $tipo,
                "companhia" => $companhia,
                "area" => $area,
                "actions" => $actions,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    ////// Fim - Ajax para datatable com paginação dinâmica




    public function create()
    {
        // Se ADMINISTRADOR, visualiza todos os registros, caso contrário, OPERADOR, só os do seu município
        if(Auth::user()->perfil == 'adm'){
            $companhias = Companhia::orderBy('nome', 'ASC')->get();
            $areas = Area::orderBy('nome', 'ASC')->get();
            $bairros = Bairro::orderBy('nome', 'ASC')->get();
            $municipios = Municipio::orderBy('nome', 'ASC')->get();
        } else {
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $areas = Area::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }

        return view('admin.associado.create', compact('companhias','areas','bairros','municipios'));

    }


    /* 1° MÉTODO OROGINAL SEM CAPTURAR FOTO
    public function store(AssociadoRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('bairros')){
                $associado->bairros()->sync($request->bairros);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.index');
    }
    */

    /* 2° MÉTODO OROGINAL CAPTURANDO FOTO
    public function store(AssociadoRequest $request)
    {
        //dd($request->all());

        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('bairros')){
                $associado->bairros()->sync($request->bairros);
            }
        DB::commit();

        // Obtendo o id do associado que acabou de ser inserido no banco de dados
        $associadoId = $associado->id;

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.retrato', $associadoId);
    }
    */


    public function store(AssociadoRequest $request)
    {
        DB::beginTransaction();
            $associado = Associado::create($request->all());

            if($request->has('areas')){
                $associado->areas()->sync($request->areas);
            }
        DB::commit();

        // Obtendo o id do associado que acabou de ser inserido no banco de dados
        $associadoId = $associado->id;

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');
        return redirect()->route('admin.associado.retrato', $associadoId);
    }



    public function show($id)
    {
        //$associado = Associado::with(['companhia', 'bairros'])->find($id);
        $associado = Associado::with(['companhia', 'areas', 'bairro', 'municipio'])->find($id);

        $companhias = Companhia::all();
        $areas = Area::all();
        $bairros = Bairro::all();
        $municipios = Municipio::all();


        return view('admin.associado.show', compact('associado', 'companhias','areas','bairros','municipios'));
    }


    public function edit($id)
    {
        //$associado = Associado::with(['companhia', 'bairros'])->find($id);
        $associado = Associado::with(['companhia', 'areas', 'bairro', 'municipio'])->find($id);

        // Se ADMINISTRADOR, visualiza todos os registros, caso contrário, OPERADOR, só os do seu município
        if(Auth::user()->perfil == 'adm'){
            $companhias = Companhia::orderBy('nome', 'ASC')->get();
            $areas = Area::orderBy('nome', 'ASC')->get();
            $bairros = Bairro::orderBy('nome', 'ASC')->get();
            $municipios = Municipio::orderBy('nome', 'ASC')->get();
        } else {
            $companhias = Companhia::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $areas = Area::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $bairros = Bairro::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
            $municipios = Municipio::where('id', '=', Auth::user()->municipio_id)->get();
        }


        return view('admin.associado.edit', compact('associado', 'companhias','areas','bairros','municipios'));
    }


    public function update($id, AssociadoUpdateRequest $request)
    {

        //dd($request->all());
        $associado = Associado::find($id);

         // Validação unique para cpf na atualização
         Validator::make($request->all(), [
            'cpf' => [
                'required',
                Rule::unique('associados')->ignore($associado->id),
            ],
        ]);

        DB::beginTransaction();
            $associado->update($request->all());

            if($request->has('areas')){
                $associado->areas()->sync($request->areas);
            }
        DB::commit();

        $request->session()->flash('sucesso', 'Registro alteado com sucesso!');

        return redirect()->route('admin.associado.index');

    }


    public function destroy($id, Request $request)
    {
        if(Gate::authorize('adm')){
            Associado::destroy($id);

            // Deletando foto e qrcode do disco
            $imgfoto = 'fotos/coletor'.$id.'.png';
            $imgqrcode = 'fotos/coletor'.$id.'qr.png';
            Storage::disk('public')->delete([$imgfoto, $imgqrcode]);


            $request->session()->flash('sucesso', 'Registro excluido com sucesso!');

            return redirect()->route('admin.associado.index');
        }

    }

    public function retrato($id)
    {
        $associado   = Associado::find($id);
        $titulo         = "RETRATO do(a) Sr(a): ";

        return view('admin.associado.retrato', compact('associado', 'titulo'));
    }


    public function salvaretrato(Request $request)
    {
        $img                = $request['base64image'];
        $idassociado        = $request['id'];
        $nomeassociado      = $request['nome'];
        $cpfassociado       = $request['cpf'];
        $companhiaassociado = $request['companhia'];

        // Deletando qualquer foto existente no banco que seja do profissional corrente
        DB::table('fotos')->where('associado_id', '=', $idassociado)->delete();

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $file = "public/fotos/coletor". $idassociado . '.png';
        $path = "fotos/coletor". $idassociado . '.png';
        $success = Storage::put($file, $data);


        //Inserindo os dados na tabela fotos. Esta tabela pode ser suprimida, uma vez que o campo imagem na tabela
        // associados será atualizado com o caminho da foto salva na pasta storage/public/fotos
        if($success){
            DB::table('fotos')->insert([
                'associado_id' => $idassociado,
                'nome' => $nomeassociado,
                'cpf' => $cpfassociado,
                'companhia' => $companhiaassociado,
                'foto' => $path,
                'created_at' => today(),
                'updated_at' => today() ]);

                // Atualizando apenas o campo image na tabela associados (este campo fica fica vazio na criação do associado)
                // Associado::where('id', $idassociado)->update(array('imagem' => $path));

                //------INICIO QRCODE

                    // Informação a ser gravada no QRCODE
                    // $informationqrcode = $nomeassociado;

                    //$informationqrcode = time().$idassociado;
                    //$informationqrcode = "http://localhost:8000/api/associado/".time().$idassociado."/dados";

                    $idqrcode = time().$idassociado;
                    //$informationqrcode = "https://procatador.setres.ma.gov.br/api/associado/".$idqrcode."/eventos";
                    $informationqrcode = "https://procatador.setres.ma.gov.br/admin/associado/consultaqr/".$idqrcode;



                    $options = new QROptions([
                        'version'    => 5,
                        'outputType' => QRCode::OUTPUT_IMAGE_PNG,   // see types click over CTRL + OUTPUT_IMAGE_PNG
                        'eccLevel'   => QRCode::ECC_L,
                    ]);

                    // invocando uma nova instância de QRCODE
                    $qrcode = new QRCode($options);

                    // Gerando imagem do qrcode
                    $imggenerated = $qrcode->render($informationqrcode);

                    //echo "<img src='$imggenerated'/>";

                    // Configurando a imagem a ser gravada na pasta
                    $imggenerated = str_replace('data:image/png;base64,', '', $imggenerated);
                    $imggenerated = str_replace(' ', '+', $imggenerated);
                    $dataQR = base64_decode($imggenerated);

                    // Configurando nome do arquivo e o caminho a ser gravado no banco (na coluna img_qr_code)
                    $fileQR = "public/fotos/coletor". $idassociado . 'qr.png';
                    $pathQR = "fotos/coletor". $idassociado . 'qr.png';

                    // Armazenando fisicamente o arquivo na pasta
                    Storage::put($fileQR, $dataQR);

                //------ FIM QRCODE

                // Atualizando os campos imagem, imagemqrcode e idqrcode na tabela associados (estes campos ficam fica vazios na criação do associado)
                Associado::where('id', $idassociado)->update(['imagem' => $path, 'imagemqrcode' => $pathQR, 'idqrcode' => $idqrcode]);

            return  "Foto salva com sucesso!";

        } else {

            return  "Não foi possível salvar a imagem capturada.";
        }
    }


    // Configuração de Relatórios PDFs
    public function relatorioassociado()
    {

        if(Auth::user()->perfil == 'adm'){
            //$associados = Associado::orderBy('nome', 'ASC')->get();
            $associados = Associado::with(['companhia', 'municipio', 'areas'])->orderBy('nome', 'ASC')->get();
        } else {
            $associados = Associado::where('municipio_id', '=', Auth::user()->municipio_id)->orderBy('nome', 'ASC')->get();
        }

        $fileName = ('Associados_lista.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 32,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:1080px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 108px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 432px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 540px;" class="titulo-rel">
                        ASSOCIADOS
                    </td>
                </tr>
            </table>
            <table style="width:1080px; border-collapse: collapse;">
                <tr>
                    <td width="50px" class="col-header-table">ID</td>
                    <td width="250px" class="col-header-table">NOME</td>
                    <td width="110px" class="col-header-table">RG</td>
                    <td width="90px" class="col-header-table">CPF</td>
                    <td width="180px" class="col-header-table">TELEFFONES</td>
                    <td width="200px" class="col-header-table">COMPANHIA / INSTITUIÇÃO</td>
                    <td width="200px" class="col-header-table">ÁREA DE ATUAÇÃO (MUNICÍPIO)</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:1080px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="360px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="360px" align="center"></td>
                    <td width="360px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.associado.pdf.pdfassociadogeral', compact('associados'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

    }


    // Relatório Excel
    public function relatorioassociadoexcel()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new AssociadoExport,'associados.xlsx');
        }

    }

    // Relatório CSV
    public function relatorioassociadocsv()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new AssociadoExport,'associados.csv');
        }
    }

    // Relatório HTML to Excel
    public function relatorioassociadoexceldois()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new AssociadoExportDois,'associadosdois.xlsx');
        }

    }


    // Relatório from TABLE/HTML to CSV
    public function relatorioassociadocsvtable()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new AssociadoExportCssTable,'associadoscrachas.csv');
        }
    }



    public function ficha($id)
    {
        $associado = Associado::find($id);

        $fileName = ('Associado_ficha.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 25,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:717px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 83px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 282px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 352px;" class="titulo-rel">
                        FICHA: '.$associado->nome.'
                    </td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:717px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="239px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="239px" align="center"></td>
                    <td width="239px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.associado.pdf.pdfassociadoficha', compact('associado'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }

    public function consultaAssociadoIdqrcode($idqrcode)
    {
        $codigodoqrcode = $idqrcode;
        return view('admin.associado.consultaqrcode', compact('codigodoqrcode'));

    }


    public function baixararquivos($id)
    {
        /*
        // Baixa apenas o arquivo arquivo de foto
    	$myFile = storage_path("app/public/fotos/coletor".$id.".png");
        return response()->download($myFile);
        */

        $zip      = new ZipArchive;
        $fileName = 'fotocracha'.$id.'.zip';
        if ($zip->open(storage_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(storage_path('app/public/fotos'));
            //dd($files);
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                if($relativeName == 'coletor'.$id.'.png'){
                    $zip->addFile($value, $relativeName);
                }
                if($relativeName == 'coletor'.$id.'qr.png'){
                    $zip->addFile($value, $relativeName);
                }
            }
            $zip->close();
        }

        return response()->download(storage_path($fileName));

    }

    public function zipdownload()
    {
        $zip      = new ZipArchive;
        $fileName = 'fotoscracha.zip';
        if ($zip->open(storage_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(storage_path('app/public/fotos'));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        return response()->download(storage_path($fileName));
    }

}
