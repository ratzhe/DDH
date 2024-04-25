<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Profissional;
use Illuminate\Http\Request;

class AgendaController extends Controller

{
    public function listar(Request $request){
        $agendas = Agenda::where('id', 'like', '%'.$request->input('id').'%')
            ->get();
        return view('site.agenda.listar', ['agendas' => $agendas]);
    }

    public function adicionar(Request $request)
{
    // Verificar se o formulário foi submetido
    if ($request->isMethod('post')) {
        // Validar os dados do formulário
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fim' => 'required',
            'profissional_id' => 'required',
        ], [
            'dia.required' => 'Indique o dia da semana!',
            'hora_inicio.required' => 'Indique o horário de início de atendimento!',
            'hora_fim.required' => 'Indique o horário de fim de atendimento!',
            'profissional_id.required' => 'Indique o profissional!',
        ]);

        // Verifica se já existe uma agenda para esse profissional no mesmo dia e intervalo de horário
        $agendaExistente = Agenda::where('dia', $request->input('dia'))
                                  ->where('profissional_id', $request->input('profissional_id'))
                                  ->where(function($query) use ($request) {
                                      $query->where(function($q) use ($request) {
                                          $q->where('hora_inicio', '<=', $request->input('hora_inicio'))
                                            ->where('hora_fim', '>=', $request->input('hora_inicio'));
                                      })
                                      ->orWhere(function($q) use ($request) {
                                          $q->where('hora_inicio', '<=', $request->input('hora_fim'))
                                            ->where('hora_fim', '>=', $request->input('hora_fim'));
                                      });
                                  })
                                  ->exists();

        // Se já existe uma agenda para esse profissional no mesmo dia e intervalo de horário, exibe uma mensagem de erro
        if ($agendaExistente) {
            return redirect()->route('site.agenda.listar')->with('error', 'Já existe uma agenda cadastrada para esse profissional no mesmo dia e intervalo de horário!');
        }

        $agenda = new Agenda([
            'dia' => $request->input('dia'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_fim' => $request->input('hora_fim'),
            'profissional_id' => $request->input('profissional_id'),
        ]);
        $agenda->save();

        return redirect()->route('site.agenda.listar')->with('success', 'Agenda adicionada com sucesso!');
    }

    $profissionais = Profissional::all();

    return view('site.agenda.adicionar', [
        'profissionais' => $profissionais,
    ]);
}

    public function editar($id){
        
        $agenda = Agenda::find($id);
        $profissionais = Profissional::all(); 

        return view('site.agenda.editar', [
            'agenda' => $agenda,
            'profissionais' => $profissionais, 
        ])->with('success', 'Agenda editada com sucesso!');
    }

    public function excluir($id){
        $agenda = Agenda::find($id);
    
        if($agenda) {
            $agenda->delete();

            return redirect()->route('site.agenda.listar')->with('success', 'Agenda excluída com sucesso!');
        } else {

            return redirect()->route('site.agenda.listar')->with('error', 'Agenda não encontrada!');
        }
    }
    
}


