<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Associado extends Model
{
    use HasFactory;

    protected $fillable = [

        'nome',
        'nascimento',
        'rg',
        'rgorgaoemissor',
        'cpf',
        'sexo',
        'racacor',
        'filiacao',
        'quantidade',
        'endereco',
        'numero',
        'bairro_id',
        'complemento',
        'municipio_id',
        'zona',
        'foneum',
        'fonedois',
        'tipo',
        'carteiraemitida',
        'carteiravalidade',
        'companhia_id',
        'imagem'
    ];


    public function companhia() {
        return $this->belongsTo(Companhia::class);
    }


    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function bairro(){
        return $this->belongsTo(Bairro::class);
    }

    public function areas() {
        return $this->belongsToMany(Area::class)->withTimestamps();
    }


    public function foto() {
        return $this->hasOne(Foto::class);
    }

    /*
    public function bairros() {
        return $this->belongsToMany(Bairro::class)->withTimestamps();
    }
    */



    // relatorio excel e csv
    public static function getAssociados(){
        /* Dados para arquivos xlsx e csv a partir dos ASSOCIADOS sem relacionamento
        $records = DB::table('associados')->select('id', 'nome', 'nascimento', 'rg', 'rgorgaoemissor', 'cpf', 'sexo', 'racacor', 'filiacao', 'quantidade', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona', 'foneum', 'fonedois', 'imagem', 'companhia_id')->get()->toArray();
        */

        /* Dados para arquivos xlsx e csv a partir dos dados dos ASSOCIADOS e COMPANHIAS
        $records = DB::table('associados')
                    ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
                    ->select(
                        'associados.id', 'associados.nome', 'associados.nascimento', 'associados.rg',
                        'associados.rgorgaoemissor', 'associados.cpf', 'associados.sexo', 'associados.racacor',
                        'associados.filiacao', 'associados.quantidade', 'associados.endereco', 'associados.numero',
                        'associados.bairro', 'associados.complemento', 'associados.cidade', 'associados.zona',
                        'associados.foneum', 'associados.fonedois', 'associados.imagem', 'associados.companhia_id',
                        'companhias.nome AS nomecompanhia')
                    ->orderBy('associados.nome', 'ASC')
                    ->get();
        */


        /* Dados para arquivos xlsx e csv a partir da dos dados dos ASSOCIADOS e COMPANHIAS e BAIRROS
        $records = DB::table('associados')
                    ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
                    ->join('associado_bairro', 'associado_bairro.associado_id', '=', 'associados.id')
                    ->join('bairros', 'bairros.id', '=', 'associado_bairro.bairro_id')
                    ->select(
                        'associados.id',
                        'associados.nome',
                        'associados.nascimento',
                        'associados.rg',
                        'associados.rgorgaoemissor',
                        'associados.cpf',
                        'associados.sexo',
                        'associados.racacor',
                        'associados.filiacao',
                        'associados.quantidade',
                        'associados.endereco',
                        'associados.numero',
                        'associados.bairro',
                        'associados.complemento',
                        'associados.cidade',
                        'associados.zona',
                        'associados.foneum',
                        'associados.fonedois',
                        'associados.imagem',
                        'associados.companhia_id',
                        'companhias.nome AS nomecompanhia',
                        'bairros.nome AS nomebairro')
                    ->orderBy('associados.nome', 'ASC')
                    ->get();
        */

        $records = DB::table('associados')
                    ->join('companhias', 'companhias.id', '=', 'associados.companhia_id')
                    ->join('municipios', 'municipios.id', '=', 'associados.municipio_id')
                    ->join('bairros', 'bairros.id', '=', 'associados.bairro_id')
                    ->join('area_associado', 'area_associado.associado_id', '=', 'associados.id')
                    ->join('areas', 'areas.id', '=', 'area_associado.area_id')
                    ->select(
                        'associados.id',
                        'associados.nome',
                        'associados.nascimento',
                        'associados.rg',
                        'associados.rgorgaoemissor',
                        'associados.cpf',
                        'associados.sexo',
                        'associados.racacor',
                        'associados.filiacao',
                        'associados.quantidade',
                        'associados.endereco',
                        'associados.numero',
                        'bairros.nome AS nomebairro',
                        'associados.complemento',
                        'municipios.nome AS nomemunicipio',
                        'associados.zona',
                        'associados.foneum',
                        'associados.fonedois',
                        'associados.tipo',
                        'companhias.nome AS nomecompanhia',
                        'areas.nome AS nomearea',
                        'associados.imagem'
                    )
                    ->orderBy('associados.nome', 'ASC')
                    ->orderBy('areas.nome', 'ASC')
                    ->get();

        return $records;
    }
}
