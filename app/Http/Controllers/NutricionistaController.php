<?php

namespace App\Http\Controllers;

use App\Models\Nutricionista;
use Illuminate\Http\Request;

class NutricionistaController extends Controller
{
    public function index(Request $request){
        $nutricionistas = Nutricionista::paginate(10);

        return view('site.medico.index', ['nutricionistas' => $nutricionistas, 'request' => $request->all()]);
    }   
}
