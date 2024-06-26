<?php

namespace App\Http\Controllers;

use App\Models\Treino;
use App\Models\Paciente;
use Illuminate\Http\Request;

class TreinoController extends Controller
{
    public function listar(Request $request) {
        $treinos = Treino::where('id', 'like', '%'.$request->input('id').'%')->get();
        return view('site.treino.listar', ['treinos' => $treinos]);
    }

    public function adicionar(Request $request) {
        // Verificar se o formulário foi submetido
        if ($request->isMethod('post')) {
            // Validar os dados do formulário
            $request->validate([
                'paciente_id' => 'required',
                'treino_1' => 'required',
                'rep_1' => 'required',
                'serie_1' => 'required',
                'treino_2' => 'required',
                'rep_2' => 'required',
                'serie_2' => 'required',
                'treino_3' => 'required',
                'rep_3' => 'required',
                'serie_3' => 'required',
                'treino_4' => 'required',
                'rep_4' => 'required',
                'serie_4' => 'required',
                'treino_5' => 'required',
                'rep_5' => 'required',
                'serie_5' => 'required',
                'treino_6' => 'required',
                'rep_6' => 'required',
                'serie_6' => 'required',
            ], [
                'paciente_id.required' => 'Indique o paciente!',
                'treino_1' => 'Preencha o treino!',
                'rep_1' => 'Preencha a quantidade de repetições!',
                'serie_1' => 'Preencha a quantidade de séries!',
                'treino_2' => 'Preencha o treino!',
                'rep_2' => 'Preencha a quantidade de repetições!',
                'serie_2' => 'Preencha a quantidade de séries!',
                'treino_3' => 'Preencha o treino!',
                'rep_3' => 'Preencha a quantidade de repetições!',
                'serie_3' => 'Preencha a quantidade de séries!',
                'treino_4' => 'Preencha o treino!',
                'rep_4' => 'Preencha a quantidade de repetições!',
                'serie_4' => 'Preencha a quantidade de séries!',
                'treino_5' => 'Preencha o treino!',
                'rep_5' => 'Preencha a quantidade de repetições!',
                'serie_5' => 'Preencha a quantidade de séries!',
                'treino_6' => 'Preencha o treino!',
                'rep_6' => 'Preencha a quantidade de repetições!',
                'serie_6' => 'Preencha a quantidade de séries!',
            ]);

            $treino = new Treino($request->all());
            $treino->save();

            return redirect()->route('site.treino.listar')->with('success', 'Plano de treinamento adicionado com sucesso!');
        }

        $pacientes = Paciente::all();

        return view('site.treino.adicionar', [
            'pacientes' => $pacientes,
        ]);
    }

    public function editar(Request $request, $id) {
        $treino = Treino::find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'paciente_id' => 'required',
                'treino_1' => 'required',
                'rep_1' => 'required',
                'serie_1' => 'required',
                'treino_2' => 'required',
                'rep_2' => 'required',
                'serie_2' => 'required',
                'treino_3' => 'required',
                'rep_3' => 'required',
                'serie_3' => 'required',
                'treino_4' => 'required',
                'rep_4' => 'required',
                'serie_4' => 'required',
                'treino_5' => 'required',
                'rep_5' => 'required',
                'serie_5' => 'required',
                'treino_6' => 'required',
                'rep_6' => 'required',
                'serie_6' => 'required',
            ]);

            $treino->fill($request->all());
            $treino->save();

            return redirect()->route('site.treino.listar')->with('success', 'Plano de treinamento editado com sucesso!');
        }

        $pacientes = Paciente::all();

        return view('site.treino.editar', [
            'treino' => $treino,
            'pacientes' => $pacientes,
        ]);
    }

    public function excluir($id) {
        $treino = Treino::find($id);

        if ($treino) {
            $treino->delete();
            return redirect()->route('site.treino.listar')->with('success', 'Plano de treinamento excluído com sucesso!');
        } else {
            return redirect()->route('site.treino.listar')->with('error', 'Plano de treinamento não encontrado!');
        }
    }

}

