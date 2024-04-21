<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Educador extends Model
{
    use HasFactory, CanResetPasswordTrait, Notifiable;

    protected $table = 'educadores';
    protected $fillable =  ['nome', 'sobrenome', 'cref', 'cpf', 'datanasc', 'genero', 'cep', 'telefone', 'email', 'senha'];
}
