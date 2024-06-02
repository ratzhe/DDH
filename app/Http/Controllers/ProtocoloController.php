<?php

namespace App\Http\Controllers;

use App\Models\Profissional;
use App\Models\Protocolo;
use Illuminate\Http\Request;

class ProtocoloController extends Controller
{
    public function listar(Request $request){
        $protocolos = Protocolo::where('id', 'like', '%'.$request->input('id').'%')
            ->get();
        return view('site.protocolo.listar', ['protocolos' => $protocolos]);
    }

    public function adicionar(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'profissional_id' => 'required',
            'especialidade' => 'required',
        ], [
            'profissional_id.required' => 'Informe o profissional!',
            'especialidade.required' => 'Informe a especialidade!',
        ]);

        // Verifica se já existe um protocolo para o mesmo profissional e especialidade
        $protocoloExistente = Protocolo::where('profissional_id', $request->input('profissional_id'))
            ->where('especialidade', $request->input('especialidade'))
            ->exists();

        if ($protocoloExistente) {
            return redirect()->route('site.protocolo.listar')->with('error', 'O protocolo para esse profissional e especialidade já foi cadastrado!')->withInput();
        }

        $protocolo = new Protocolo([
            'profissional_id' => $request->input('profissional_id'),
            'especialidade' => $request->input('especialidade'),
        ]);
        $protocolo->save();

        return redirect()->route('site.protocolo.listar')->with('success', 'Protocolo adicionado com sucesso!');
    }

    $profissionais = Profissional::all();

    return view('site.protocolo.adicionar', [
        'profissionais' => $profissionais,
    ]);
}


    public function editar($id){
            
        $protocolos = Protocolo::find($id);
        $profissionais = Profissional::all(); 

        return view('site.protocolo.editar', [
            'protocolos' => $protocolos,
            'profissionais' => $profissionais, 
        ])->with('success', 'Protocolo editado com sucesso!');
    }

    public function excluir($id){
        $protocolo = Protocolo::find($id);
    
        if($protocolo) {
            $protocolo->delete();

            return redirect()->route('site.protocolo.listar')->with('success', 'Protocolo excluído com sucesso!');
        } else {

            return redirect()->route('site.protocolo.listar')->with('error', 'Protocolo não encontrado!');
        }
    }
}
