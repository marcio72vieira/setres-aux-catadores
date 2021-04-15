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
	    $user->name = "Marcio Vieira";
	    $user->email = "admin@setres.com";
        $user->cpf = "471.183.423-00";
	    $user->password = Hash::make('setres@123');
	    $user->save();

        $user2 = new User();
        $user->name = "Operador";
	    $user->email = "operador@setres.com";
        $user->cpf = "222.222.222-22";
	    $user->password = Hash::make('setres@123');
	    $user->save();
    }
}
