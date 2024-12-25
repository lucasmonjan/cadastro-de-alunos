<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Recuperar os registros no banco de dados
      $users =  User::orderByDesc('id')->get();
        // agora vou carregar a view
        return view('users.index', ['users' => $users]);
    }

    public function show(User $user){
        return view('users.show', ['user' => $user]);
    }

    public function create(){
        // agora vou carregar a view
        return view('users.create');
    }

    public function store(UserRequest $request ){
        //validacao do formulario
        $request->validated();

        //Cadastrar o registro do aluno no BD
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        //Redirecionar o Usuario,  enviar mensagem de sucesso.
        return redirect()->route('user.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function edit(User $user){
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        //validar o formulario
        $request->validated();

        //editar as imformacoes do registro no banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
         //Redirecionar o Usuario,  enviar mensagem de sucesso.
         return redirect()->route('user.show', ['user' => $user->id ])->with('success', 'Aluno foi Editado  com sucesso!');
    }

    public function destroy(User $user)
    {
        //Apagar o registro no BD
        $user->delete();

        return redirect()->route('user.index', ['user' => $user->id ])->with('success', 'Aluno foi Eliminado  com sucesso!');
    }
}
