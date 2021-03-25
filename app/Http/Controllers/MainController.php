<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MainController extends Controller
{
    public function login()
    {
        /*
        $user = User::where('id', 1)->first();
        $user->password = bcrypt('123456');
        $user->save();
        */
        return view('front.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('falha','Email não confere!');
        } else {
            // verificando a senha
            //if(Hash::check($request->password, $userInfo->password)){
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('idUsuarioLogado', $userInfo->id);
                $request->session()->put('nameUsuarioLogado', $userInfo->name);
                $request->session()->put('emailUsuarioLogado', $userInfo->email);

                return redirect()->route('admin.residuo.index');

            }else{

                return back()->with('falha', 'Senha não confere!');
            }

        }

        return $request->input();

    }

    public function logout()
    {
        if(session()->has('idUsuarioLogado')){
            session()->pull('idUsuarioLogado');
            session()->pull('nameUsuarioLogado');
            session()->pull('emailUsuarioLogado');

            return redirect()->route('front.login');
        }
    }
}
