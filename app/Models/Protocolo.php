<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    use HasFactory;

    protected $table = 'protocolos';
    protected $fillable =  ['profissional_id', 'especialidade'];

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }

    public function agendas()
    {
        return $this->hasMany(Agenda::class);
    }
}
