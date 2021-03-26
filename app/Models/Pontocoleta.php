<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontocoleta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'zona',
    ];

    public function residuos(){
        return $this->belongsToMany(Residuo::class)->withTimestamps();
    }
}
