<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class Nutricionista extends Model
{
    use HasFactory, CanResetPasswordTrait, Notifiable;


    protected $table = 'nutricionistas';
    protected $fillable = ['nome', 'sobrenome', 'cfn', 'cpf', 'datanasc', 'genero', 'cep', 'telefone', 'email', 'senha'];

}