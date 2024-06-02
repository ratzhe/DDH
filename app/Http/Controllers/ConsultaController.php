<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function listar(Request $request){
        return view('site.consulta.adicionar');
    }

    public function adicionar(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'data' => 'required',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
            'agenda_id' => 'required',
            'paciente_id' => 'required'
        ], [
            'paciente_id.required' => 'Informe o paciente!',
            'data.required' => 'Informe a data!',
            'hora_inicio' => 'Informe o horário de início!',
            'hora_fim' => 'Informe o horário de término!',
            'agenda_id' => 'Informe a agenda!'
        ]);


    return view('site.protocolo.adicionar');
}

    
}
}