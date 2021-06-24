<?php

namespace App\Http\Controllers;

use App\Models\Concurso;
use App\Models\OpcoesVagas;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function infoConcurso(Request $request)
    {
        $vagas = OpcoesVagas::where('concursos_id', $request->concurso);

        return view('inscricao.formulario')->with(['concurso' => $vagas]);
    }
}
