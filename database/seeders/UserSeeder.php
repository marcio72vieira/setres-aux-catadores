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
	    $user->name = "Administrador";
	    $user->email = "admin@setres.com";
	    $user->password = Hash::make('123456');
	    $user->save();

        $user2 = new User();
        $user->name = "Operador";
	    $user->email = "operador@setres.com";
	    $user->password = Hash::make('123456');
	    $user->save();
    }
}
