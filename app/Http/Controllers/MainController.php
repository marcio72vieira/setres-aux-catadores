<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MainController extends Controller
{
    public function login()
    {
        /* $user = new User; $user->name = 'Administradr'; $user->email = 'marcio@setres.com'; $user->password = bcrypt('123456'); $user->save(); */

        return view('front.login');
    }

    public function check(Request $request)
    {

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['O email não é válido!']);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            $userInfo = User::where('email', '=', $request->email)->first();
            $request->session()->put('idUsuarioLogado', $userInfo->id);
            $request->session()->put('nameUsuarioLogado', $userInfo->name);
            $request->session()->put('emailUsuarioLogado', $userInfo->email);

            //return redirect()->route('admin.residuo.index');
            return redirect()->route('admin.bairro.index');
        }

        return redirect()->back()->withInput()->withErrors(['Usuário e/ou Senha não conferem!']);

    }

    public function logout()
    {
        Auth::logout();
	    return redirect()->route('front.login');
    }
}
