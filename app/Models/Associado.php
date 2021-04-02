<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'bairro',
        'complemento',
        'cidade',
        'zona',
        'foneum',
        'fonedois',
        'companhia_id',
        'imagem'
    ];


    public function companhia() {
        return $this->belongsTo(Companhia::class);
    }

    public function bairros() {
        return $this->belongsToMany(Bairro::class)->withTimestamps();
    }

    public function foto() {
        return $this->hasOne(Foto::class);
    }
}
