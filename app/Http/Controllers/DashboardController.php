<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\http\controllers\AuthController;

class DashboardController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está autenticado
        if (Auth::check()) {
            // Recupera o nome do usuário autenticado
            $name = Auth::user()->name;

            // Retorna a view com o nome do usuário
            return view('dashboard', compact('name'));
        }
    }
}
