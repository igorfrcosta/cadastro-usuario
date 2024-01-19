<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }

    public function salvar(Request $request) {

        $request->validate([
                'nome' => 'required|min:3|max:50',
                'email' => 'required|email',
                'senha' => 'required|min:6|max:20',
                'confirmacao_senha' => 'required|same:senha'
            ],
            [
                'nome.required' => 'O campo "Nome" é obrigatório.',
                'nome.min' => 'O campo "Nome" precisa ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo "Nome" precisa ter no máximo 50 caracteres.',
                'email.required' => 'O campo "Email" é obrigatório.',
                'email.email' => 'O campo "Email" precisa ser preenchido com um Email válido.',
                'senha.required' => 'O campo "Senha" é obrigatório.',
                'senha.min' => 'O campo "Senha" precisa ter no mínimo 6 caracteres.',
                'senha.max' => 'O campo "Senha" precisa ter no máximo 20 caracteres.',
                'confirmacao_senha.required' => 'O campo "Confirmação de Senha" é obrigatório.',
                'confirmacao_senha.same' => 'O campo "Confirmação de Senha" precisa ser preenchido igual ao campo "Senha".',
            ]
        );

        try{
            $user = new User();
            $user->nome = $request->input('nome');
            $user->email = $request->input('email');
            $user->senha = Hash::make($request->input('senha'));
            $user->save();

            return redirect()->route('index')->with('message', 'Usuário cadastrado com sucesso.');
        }
        catch(\Exception $e){
            return redirect()->route('index')->with('message', 'Não foi possível cadastrar o Usuário.');
        }
    }
}
