<?php

namespace App\Http\Controllers;

use App\Models\Alimentacao;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AlimentacaoController extends Controller
{
    public function listar(Request $request) {
        $alimentacoes = Alimentacao::where('id', 'like', '%'.$request->input('id').'%')->get();
        return view('site.alimentacao.listar', ['alimentacoes' => $alimentacoes]);
    }

    public function adicionar(Request $request) {
        // Verificar se o formulário foi submetido
        if ($request->isMethod('post')) {
            // Validar os dados do formulário
            $request->validate([
                'paciente_id' => 'required',
                'cafe_1' => 'required',
                'cafe_2' => 'required',
                'cafe_3' => 'required',
                'lanche_m_1' => 'required',
                'lanche_m_2' => 'required',
                'lanche_m_3' => 'required',
                'almoco_1' => 'required',
                'almoco_2' => 'required',
                'almoco_3' => 'required',
                'lanche_1' => 'required',
                'lanche_2' => 'required',
                'lanche_3' => 'required',
                'jantar_1' => 'required',
                'jantar_2' => 'required',
                'jantar_3' => 'required',
                'ceia_1' => 'required',
                'ceia_2' => 'required',
                'ceia_3' => 'required',
            ], [
                'paciente_id.required' => 'Indique o paciente!',
                'cafe_1.required' => 'Indique a opção de Café da Manhã!',
                'cafe_2.required' => 'Indique a opção de Café da Manhã!',
                'cafe_3.required' => 'Indique a opção de Café da Manhã!',
                'lanche_m_1.required' => 'Indique a opção de Lanche da Manhã!',
                'lanche_m_2.required' => 'Indique a opção de Lanche da Manhã!',
                'lanche_m_3.required' => 'Indique a opção de Lanche da Manhã!',
                'almoco_1.required' => 'Indique a opção de Almoço!',
                'almoco_2.required' => 'Indique a opção de Almoço!',
                'almoco_3.required' => 'Indique a opção de Almoço!',
                'lanche_1.required' => 'Indique a opção de Lanche da Tarde!',
                'lanche_2.required' => 'Indique a opção de Lanche da Tarde!',
                'lanche_3.required' => 'Indique a opção de Lanche da Tarde!',
                'jantar_1.required' => 'Indique a opção de Jantar!',
                'jantar_2.required' => 'Indique a opção de Jantar!',
                'jantar_3.required' => 'Indique a opção de Jantar!',
                'ceia_1.required' => 'Indique a opção de Ceia!',
                'ceia_2.required' => 'Indique a opção de Ceia!',
                'ceia_3.required' => 'Indique a opção de Ceia!',
            ]);

            $alimentacao = new Alimentacao($request->all());
            $alimentacao->save();

            return redirect()->route('site.alimentacao.listar')->with('success', 'Plano alimentar adicionado com sucesso!');
        }

        $pacientes = Paciente::all();

        return view('site.alimentacao.adicionar', [
            'pacientes' => $pacientes,
        ]);
    }

    public function editar(Request $request, $id) {
        $alimentacao = Alimentacao::find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'paciente_id' => 'required',
                'cafe_1' => 'required',
                'cafe_2' => 'required',
                'cafe_3' => 'required',
                'lanche_m_1' => 'required',
                'lanche_m_2' => 'required',
                'lanche_m_3' => 'required',
                'almoco_1' => 'required',
                'almoco_2' => 'required',
                'almoco_3' => 'required',
                'lanche_1' => 'required',
                'lanche_2' => 'required',
                'lanche_3' => 'required',
                'jantar_1' => 'required',
                'jantar_2' => 'required',
                'jantar_3' => 'required',
                'ceia_1' => 'required',
                'ceia_2' => 'required',
                'ceia_3' => 'required',
            ]);

            $alimentacao->fill($request->all());
            $alimentacao->save();

            return redirect()->route('site.alimentacao.listar')->with('success', 'Plano alimentar editado com sucesso!');
        }

        $pacientes = Paciente::all();

        return view('site.alimentacao.editar', [
            'alimentacao' => $alimentacao,
            'pacientes' => $pacientes,
        ]);
    }

    public function excluir($id) {
        $alimentacao = Alimentacao::find($id);

        if ($alimentacao) {
            $alimentacao->delete();
            return redirect()->route('site.alimentacao.listar')->with('success', 'Plano alimentar excluído com sucesso!');
        } else {
            return redirect()->route('site.alimentacao.listar')->with('error', 'Plano alimentar não encontrado!');
        }
    }

}
