<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concurso;

class WelcomeController extends Controller
{
    public function index() {
        $concursosAbertos = Concurso::where('data_resultado_selecao', '>=', now())->get();
        $concursosEncerrados = Concurso::where('data_resultado_selecao', '<', now())->get();

        return view('welcome', compact('concursosAbertos', 'concursosEncerrados'));
    }
}
