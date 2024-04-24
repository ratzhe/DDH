<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index(){
        $email = Session::get('email');
        $usuario = Cadastro::where('email', $email)->first();
        return view('site.perfil', ['usuario' => $usuario]);
    }

    public function editar(Request $request){
        $email = Session::get('email');
        $usuario = Cadastro::where('email', $email)->first();
    
        if ($request->filled('senha')) {
            $usuario->senha = Hash::make($request->senha);
        }

        $usuario->fill($request->except('senha'));
        $usuario->save();
        return redirect()->route('site.perfil')->with('success', 'Perfil atualizado com sucesso!');
    }
}
