<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Municipio;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        $municipios = Municipio::all();

        return view('admin.user.create', compact('municipios'));
    }


    public function store(UserRequest $request)
    {

        $user = new User();

        $user->fullname = $request->fullname;
        $user->cpf = $request->cpf;
        $user->telefone = $request->telefone;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->perfil = $request->perfil;
        $user->municipio_id = $request->municipio_id;
        $user->password = bcrypt($request->password);

        $user->save();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.user.index');
    }


    public function show($id)
    {
        $user = User::find($id);
        $municipios = Municipio::all();

        return view('admin.user.show', compact('user', 'municipios'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $municipios = Municipio::all();

        $usuario = User::find($id);

        return view('admin.user.edit', compact('user', 'municipios'));
    }

    public function atualizarmeusdados()
    {
        $usuario = User::find(Auth::user()->id);
        $acao = "Atualização";
        $id = Auth::user()->id;

        return view('admin.usuario.editar', compact('usuario', 'acao', 'id'));

    }


    public function update($id, UserUpdateRequest $request)
    {
        $user = User::find($id);

        $user->fullname     = $request->fullname;
        $user->cpf          = $request->cpf;
        $user->telefone     = $request->telefone;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->perfil       = $request->perfil;
        $user->municipio_id = $request->municipio_id;

        if($request->password == ''){
            $user->password = $request->old_password_hidden;
        }else{
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admin.user.index');

    }


    public function updateprofile($id, UserUpdateProfileRequest $request)
    {
            $user = User::find($id);

            //dd($request->all());

            $user->fullname     = $request->fullname;
            $user->cpf          = $request->cpf;
            $user->telefone     = $request->telefone;
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->perfil       = $request->perfil;         // não é alterado pelo usuário
            $user->municipio_id = $request->municipio_id;   // não é alterado pelo usuário

            if($request->password == ''){
                $user->password = $request->password_hidden;
            }else{
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('front.logout');


    }


    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.user.index');
    }
}
