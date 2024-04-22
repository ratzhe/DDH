<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Medico;
use App\Models\Educador;
use App\Models\Nutricionista;
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

        // Criar a nova entrada na agenda
        $agenda = new Agenda([
            'dia' => $request->input('dia'),
            'hora_inicio' => $request->input('hora_inicio'),
            'hora_fim' => $request->input('hora_fim'),
            'profissional_id' => $request->input('profissional_id'),
        ]);
        $agenda->save();

        // Redirecionar após adicionar a agenda
        return redirect()->route('site.agenda.listar')->with('success', 'Agenda adicionada com sucesso!');
    }

    // Obter os profissionais
    $profissionais = Profissional::all();

    // Retornar a view com os profissionais
    return view('site.agenda.adicionar', [
        'profissionais' => $profissionais,
    ]);
}

    public function editar($id){
        //$agenda = Agenda::find($id);
        //return view('site.agenda.editar', ['agenda' => $agenda]);

        $agenda = Agenda::find($id);
        $profissionais = Profissional::all(); // Obter os profissionais

        return view('site.agenda.editar', [
            'agenda' => $agenda,
            'profissionais' => $profissionais, // Passar os profissionais para a view
        ]);
    }

    public function excluir($id){
        $agenda = Agenda::find($id);
    
        if($agenda) {
            $agenda->delete();
            // Redirecionar após a exclusão
            return redirect()->route('site.agenda.listar')->with('success', 'Agenda excluída com sucesso!');
        } else {
            // Se o modelo não for encontrado, redirecionar com uma mensagem de erro
            return redirect()->route('site.agenda.listar')->with('error', 'Agenda não encontrada!');
        }
    }
    
}


