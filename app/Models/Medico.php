<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class Medico extends Model
{
    use HasFactory, CanResetPasswordTrait, Notifiable;

   protected $table = 'medicos';
   protected $fillable = ['nome', 'sobrenome', 'crm', 'cpf', 'datanasc', 'genero', 'cep', 'telefone', 'email', 'senha'];
}
