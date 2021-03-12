<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
