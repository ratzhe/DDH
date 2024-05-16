<?php

namespace App\Http\Controllers;

use App\Models\Alimentacao;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AlimentacaoController extends Controller
{
    public function listar(Request $request){
        $alimentacoes = Alimentacao::where('id', 'like', '%'.$request->input('id').'%')
            ->get();
        return view('site.alimentacao.listar', ['alimentacoes' => $alimentacoes]);
    }

    public function adicionar(Request $request)
{
    // Verificar se o formulário foi submetido
    if ($request->isMethod('post')) {
        // Validar os dados do formulário
        $request->validate([
            'paciente_id' => 'required',
            'cafe_1' => 'required',
            'lanche_m_1' => 'required',
            'almoco_1' => 'required',
            'lanche_1' => 'required',
            'jantar_1' => 'required',
            'ceia_1' => 'required', 
            
        ], [
            'paciente_id.required' => 'Indique o paciente!',
            'cafe_1.required' => 'Indique a opção de Café da Manhã!',
            'lanche_m_1.required' => 'Indique a opção de Lanche da Manhã!',
            'almoco_1.required' => 'Indique a opção de Almoço!',
            'lanche_1.required' => 'Indique a opção de Lanche da Tarde!',
            'jantar_1.required' => 'Indique a opção de Jantar',
            'ceia_1.required' => 'Indique a opção de Ceia!', 
        ]);

        $alimentacao = new Alimentacao([
            'paciente_id' => $request->input('paciente_id'),
            'cafe_1' => $request->input('cafe_1'),
            'cafe_2' => $request->input('cafe_2'),
            'cafe_3' => $request->input('cafe_3'),
            'lanche_m_1' => $request->input('lanche_m_1'),
            'lanche_m_2' => $request->input('lanche_m_2'),
            'lanche_m_3' => $request->input('lanche_m_3'),
            'almoco_1' => $request->input('almoco_1'),
            'almoco_2' => $request->input('almoco_2'),
            'almoco_3' => $request->input('almoco_3'),
            'lanche_1' => $request->input('lanche_1'),
            'lanche_2' => $request->input('lanche_2'),
            'lanche_3' => $request->input('lanche_3'),
            'jantar_1' => $request->input('jantar_1'),
            'jantar_2' => $request->input('jantar_2'),
            'jantar_3' => $request->input('jantar_3'),
            'ceia_1' => $request->input('ceia_1'),
            'ceia_2' => $request->input('ceia_2'),
            'ceia_3' => $request->input('ceia_3'),
        ]);
        $alimentacao->save();

        return redirect()->route('site.alimentacao.listar')->with('success', 'Plano alimentar adicionado com sucesso!');
    }

    $pacientes = Paciente::all();

    return view('site.alimentacao.adicionar', [
        'pacientes' => $pacientes,
    ]);
}

public function editar($id){
        
    $alimentacao = Alimentacao::find($id);
    $pacientes = Paciente::all(); 

    return view('site.alimentacao.editar', [
        'alimentacao' => $alimentacao,
        'pacientes' => $pacientes, 
    ])->with('success', 'Plano alimentar editado com sucesso!');
}

public function excluir($id){
    $alimentacao = Alimentacao::find($id);

    if($alimentacao) {
        $alimentacao->delete();

        return redirect()->route('site.alimentacao.listar')->with('success', 'Plano alimentar excluído com sucesso!');
    } else {

        return redirect()->route('site.alimentacao.listar')->with('error', 'Plano alimentar não encontrado!');
    }
}
}
