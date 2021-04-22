<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Municipio;

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

        return view('admin.user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admin.user.index');
    }
}
