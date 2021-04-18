<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Companhia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cnpj',
        'fundacao',
        'foneum',
        'fonedois',
        'presidente',
        'fonepresidente',
        'vicepresidente',
        'fonevicepresidente',
        'endereco',
        'numero',
        'bairro_id',
        'complemento',
        'municipio_id',
        'zona',
    ];

    public function associados() {
        return $this->hasMany(Associado::class);
    }

    public function residuos(){
        return $this->belongsToMany(Residuo::class)->withTimestamps();
    }

    public function bairro(){
        return $this->belongsTo(Bairro::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function pontocoletas(){
        return $this->hasMany(Pontocoleta::class);
    }

    // relatorio excel e csv
    public static function getCompanhias(){
        $records = DB::table('companhias')->select('id', 'nome', 'cnpj', 'fundacao', 'foneum', 'fonedois', 'presidente', 'fonepresidente', 'vicepresidente', 'fonevicepresidente', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona')->get()->toArray();
        return $records;
    }
}
