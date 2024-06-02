<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'treinos';
    protected $fillable =  ['paciente_id', 'treino_1', 'treino_2', 'treino_3', 'treino_4', 'treino_5', 'treino_6'];

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
