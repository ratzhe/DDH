<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'treinos';
    protected $fillable =  ['paciente_id', 'treino_1', 'rep_1', 'serie_1', 'treino_2', 'rep_2', 'serie_2',
        'treino_3', 'rep_3', 'serie_3', 'treino_4', 'rep_4', 'serie_4', 'treino_5', 'rep_5', 'serie_5',
        'treino_6', 'rep_6', 'serie_6'];

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
