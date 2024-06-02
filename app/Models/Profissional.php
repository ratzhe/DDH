<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $table = 'profissionais';
    protected $fillable = ['nome', 'sobrenome', 'profissional', 'registro', 'cpf', 'datanasc', 'genero', 'cep', 'telefone', 'email', 'senha'];

    public function protocolos()
    {
        return $this->hasMany(Protocolo::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }

}
