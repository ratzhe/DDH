<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;

class Cadastro extends Model implements CanResetPassword
{
    use HasFactory, CanResetPasswordTrait, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'nome', 'sobrenome', 'cpf', 'email', 'senha'
    ];
}




