<?php

namespace App\Http\Controllers;

use App\Models\Concurso;
use Illuminate\Http\Request;

class PresidenteBancaController extends Controller
{
    public function showConcursos()
    {
        $concursos = Concurso::all();
        return view('presidente-banca.concursos', compact('concursos'));
    }
}
