<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    public function associados() {
        return $this->belongsToMany(Associado::class)->withTimestamps();
    }
}
