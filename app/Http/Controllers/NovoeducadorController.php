<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovoeducadorController extends Controller
{
    public function index(){
        return view('site.novoeducador');
    }
}
