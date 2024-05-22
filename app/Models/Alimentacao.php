<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentacao extends Model
{
    use HasFactory;
    protected $table = 'alimentacao';
    protected $fillable =  ['paciente_id', 'cafe_1', 'cafe_2', 'cafe_3', 'lanche_m_1', 'lanche_m_2', 'lanche_m_3',
                            'almoco_1', 'almoco_2', 'almoco_3', 'lanche_1', 'lanche_2', 'lanche_3',
                            'jantar_1', 'jantar_2', 'jantar_3', 'ceia_1', 'ceia_2', 'ceia_3'];

    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
}
