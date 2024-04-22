<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index(){
        return view('site.perfil');
    }

    public function editar($id){
        $usuario = Cadastro::find($id);
        return view('site.perfil.editar', ['usuario' => $usuario]);
    }
}
