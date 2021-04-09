<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    // relatorio excel e csv
    public static function getPontoscoletaORIGINAL(){
        $records = DB::table('pontocoletas')->select('id', 'nome', 'endereco', 'numero', 'bairro', 'complemento', 'cidade', 'zona')->get()->toArray();
        return $records;
    }

    public static function getPontoscoleta(){
        $records = Pontocoleta::select('pontocoletas.id', 'pontocoletas.nome', 'pontocoletas.endereco', 'pontocoletas.numero', 'pontocoletas.bairro', 'pontocoletas.complemento', 'pontocoletas.cidade', 'pontocoletas.zona', 'residuos.nome')
                    ->join('residuos', 'pontocoletas.id', '=', 'residuos.id')
                    ->get();
        return $records;
    }

    public static function getPontoscoleta2(){
        $records = Pontocoleta::with('residuos')->get();
        return $records;
    }



    /*


        EXEMPLO 1
        $data= Model1::select('model1.field_name', 'model1.another_field', 'model2.name')
        ->join('model2', 'model1.fkeymodel2', '=', 'model2.id')
        ->get();


        EXEMPLO 2
        // Fetch a Model1 with Model2 eager loaded.
        $myModel1 = Model1::with('model2')->first();

        // print the name field from Model2 via Model1
        echo $myModel1->model2->name;

    */
}
