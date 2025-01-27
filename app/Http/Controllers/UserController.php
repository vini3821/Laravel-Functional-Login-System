<?php

namespace App\Http\Controllers;

use App\Models\crudUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    // Exibe todos os usuários
    public function index()
    {
        $users = crudUser::all();
        return response()->json($users);
    }

    // Mostra o formulário de criação (opcional para API)
    public function create()
    {
        //
    }

    // Salva um novo usuário
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|string|min:6',
            // Outras validações conforme necessário
        ]);
    
        $validatedData['senha'] = Hash::make($validatedData['senha']); // Criptografa a senha
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'senha' => $validatedData['senha'],
            // Adicione outros campos aqui conforme necessário
        ]);
    
        return response()->json($user, 201);
    }
    // Exibe um usuário específico
    public function show($id)
    {
        $user = crudUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        return response()->json($user);
    }

    // Mostra o formulário de edição (opcional para API)
    public function edit($id)
    {
        //
    }

    // Atualiza um usuário existente
    public function update(Request $request, $id)
    {
        $user = crudUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $id,
            'senha' => 'string|min:6',
        ]);

        if (isset($validatedData['senha'])) {
            $validatedData['senha'] = bcrypt($validatedData['senha']); // Criptografa a senha
        }

        $user->update($validatedData);

        return response()->json($user);
    }

    // Remove um usuário
    public function destroy($id)
    {
        $user = crudUser::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }
}
