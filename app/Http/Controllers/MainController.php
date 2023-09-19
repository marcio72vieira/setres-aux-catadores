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
            //return redirect()->route('admin.bairro.index');
            return view('admin.associado.index');

        }

        return redirect()->back()->withInput()->withErrors(['Usuário e/ou Senha não conferem!']);

    }


    public function logout()
    {
        Auth::logout();
	    return redirect()->route('front.login');
    }



    /* public function logout(Request $request)
    {
        // Esse trecho de código se faz necessário pelo fato de se o usuário tentar alterar o seu perfil e não fornecer
        // todos os dados, uma chave de sessão chamada errorperfil será criada. E se o usuário desitir de alterar o seu
        // perfil clicando no botão cancelar ou fora da "modal" a sessão 'errorperfil' continuará existindo, fazendo com
        // que quando o mesmo entrar em qualquer outra página ou mesmo executando logout e voltando novamente ao sistema
        // a modal seja exibida. Portanto faz-se necessário matar a sessão 'errorperfil' para evitar este transtorno.
        // Obs: Todo esse processo era válido antes de criar a função matarerrorperfil ao clicar no botão cancelar ou
        // no 'x' da modal Editar Perfil. Agora a session errorperfil é cancelarda quando se clica no botão cancelar
        // ou 'x' da modal, fazendo com que o public funciont logout() anterior funcione normalmente como antes.

        $request->session()->forget('errorperfil');

        Auth::logout();

	    return redirect()->route('front.login');
    } */
}
