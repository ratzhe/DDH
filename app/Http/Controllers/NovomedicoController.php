<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovomedicoController extends Controller
{
    public function index(){
        return view('site.novomedico');
    }
}
