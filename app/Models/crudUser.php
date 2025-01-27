<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crudUser extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nome da tabela no banco

    /**
     * Os atributos que podem ser atribuídos em massa.
     */
    protected $fillable = [
        'name',
        'email',
        'senha',
    ];

    /**
     * Oculta atributos ao serializar o modelo.
     */
    protected $hidden = [
        'senha', // Esconde a senha para segurança
        'remember_token',
    ];
}
