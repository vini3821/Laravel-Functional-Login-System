<?php

namespace App\Http\Controllers;
use App\Models\crudUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {

    
        // Tenta autenticar o usuário com as credenciais fornecidas
        
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->senha, $user->senha)) {
                return response()->json(['message' => 'Credenciais incorretas'], 401);
            }
    
            // Gera o token de acesso para o usuário
            $token = $user->createToken('Token de Acesso')->plainTextToken;
            
            // Retorna a resposta com o token
            return response()->json([
                'message' => 'Logado com sucesso',
                'token' => $token,
            ], 200);
    
    }
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|string|min:6|confirmed',
        ]);

        $user = crudUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'senha' => Hash::make($validatedData['senha']),
        ]);

        //return redirect()->route('login.form')->with('success', 'Usuário cadastrado com sucesso!');
        return response()->json(['message' => 'Usuário cadastrado com sucesso!'], 201);
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
