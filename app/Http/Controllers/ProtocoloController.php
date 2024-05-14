<?php

namespace App\Http\Controllers;

use App\Models\Protocolo;
use Illuminate\Http\Request;

class ProtocoloController extends Controller
{
    public function listar(Request $request){
        return view('site.protocolo.adicionar');
    }

    public function adicionar(Request $request){
        return view('site.protocolo.adicionar');
    }

    public function editar($id){
        return view('site.protocolo.editar');
    }

    public function excluir($id){
        return view('site.protocolo.excluir');
    }
}
