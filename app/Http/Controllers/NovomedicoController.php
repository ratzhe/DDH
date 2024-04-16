<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NovomedicoController extends Controller
{
    public function index(){
        return view('site.novomedico');
    }

    
}

