<?php

namespace App\Http\Controllers;
use App\Models\crudUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        // Validação dos dados de entrada
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        // Verifica se o usuário existe e as credenciais estão corretas
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['senha'], $user->senha)) {
            return redirect()->route('login')->withErrors(['email' => 'Credenciais incorretas.']);
        }

        // Autentica o usuário manualmente
        Auth::login($user);

        // Redireciona para a dashboard
        return redirect()->route('dashboard')->with('success', 'Logado com sucesso!');
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
