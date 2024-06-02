<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';
    protected $fillable = ['data', 'hora_inicio', 'hora_fim', 'agenda_id', 'paciente_id'];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}