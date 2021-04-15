<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->cpf = $request->cpf;
        $user->email = $request->email;
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
