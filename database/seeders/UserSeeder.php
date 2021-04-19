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
        $user->cpf = "471.183.423-11";
	    $user->password = Hash::make('123456');
	    $user->save();
    }
}
