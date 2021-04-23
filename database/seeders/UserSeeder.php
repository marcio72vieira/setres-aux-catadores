<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->fullname = "Marcio Nonato F Vieira";
        $user->cpf = "471.183.423-11";
        $user->telefone = "(98) 98702-3329";
	    $user->name = "Marcio Vieira";
	    $user->email = "marcio@seati.ma.gov.br";
        $user->perfil = "adm";
        $user->municipio_id = 1;
	    $user->password = Hash::make('123456');
	    $user->save();
    }
}
