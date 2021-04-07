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
        'bairro',
        'complemento',
        'cidade',
        'zona',
    ];

    public function associados() {
        return $this->hasMany(Associado::class);
    }

    public function residuos(){
        return $this->belongsToMany(Residuo::class)->withTimestamps();
    }

    // relatorio excel e csv
    public static function getCompanhias(){
        $records = DB::table('companhias')->select('id', 'nome', 'cnpj', 'fundacao', 'foneum', 'fonedois', 'presidente', 'fonepresidente', 'vicepresidente', 'fonevicepresidente', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona')->get()->toArray();
        return $records;
    }
}
