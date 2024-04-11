<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovousuarioController extends Controller
{
    public function index(){
        return view('site.novousuario');
    }
}
