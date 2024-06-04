<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';
    protected $fillable = ['dia', 'hora_inicio', 'hora_fim', 'periodo', 'profissional_id', 'protocolo_id'];

    public function protocolo()
    {
        return $this->belongsTo(Protocolo::class);
    }

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }
}
