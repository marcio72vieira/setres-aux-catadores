<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Municipio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    public function index()
    {
        if(Gate::authorize('adm')){
            $users = User::all();

            return view('admin.user.index', compact('users'));
        }
    }


    public function create()
    {
        if(Gate::authorize('adm')){
            $municipios = Municipio::all();

            return view('admin.user.create', compact('municipios'));
        }
    }


    public function store(UserRequest $request)
    {

        if(Gate::authorize('adm')){
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
    }


    public function show($id)
    {
        if(Gate::authorize('adm')){
            $user = User::find($id);
            $municipios = Municipio::all();

            return view('admin.user.show', compact('user', 'municipios'));
        }
    }


    public function edit($id)
    {
        if(Gate::authorize('adm')){
            $user = User::find($id);
            $municipios = Municipio::all();

            $usuario = User::find($id);

            return view('admin.user.edit', compact('user', 'municipios'));
        }
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
        if(Gate::authorize('adm')){
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
    }


    public function updateprofile($id, Request $request)
    {
        // Realiza o processo de validação in-loco. Se houver algum erro é criado na SESSION uma chave: 'errorperfil' com o
        // valor 'true' que é irrelevante. Depois somos direcionado de volta para a rota anterior back() levando consigo
        // todos os erros encontrados, juntamente com os valores dos campos que foram digitados anteriormente.
        // Se não houver error, salva-se os campos normalmente e apaga-se eventualemente a SESSION com a chave 'errorperfil'
        // caso exista. Logo depois somos redireionado para a routa de logout para que o usuário refaça novamente seu
        // login.

        $validator = Validator::make($request->all(), [
            'fullname'              => 'bail|required|string',
            'cpf'                   => 'required',
            'telefone'              => 'required',
            'name'                  => 'bail|required|string',  // é o campo usuário
            'email'                 => 'bail|required|string|email',
            'perfil'                => 'bail|required',
            'municipio_id'          => 'bail|required',
            'password'              => 'bail|required_with:password_confirmation|confirmed',
            'password_confirmation' => 'bail|required_with:password',
        ]);

        if ($validator->fails()) {
            $request->session()->put('errorperfil', true);
            //dd($request->session()->all());
            return back()->withErrors($validator)->withInput();
        }else {

            $user = User::find($id);

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

            $request->session()->forget('errorperfil');

            return redirect()->route('front.logout');
        }

    }


    public function destroy($id, Request $request)
    {
        if(Gate::authorize('adm')){
            User::destroy($id);

            $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

            return redirect()->route('admin.user.index');
        }
    }
}
