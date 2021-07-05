<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arquivo;

class ArquivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($arquivo, $cod)
    {
        $arquivos = Arquivo::find($arquivo);
        $this->authorize('view', $arquivos);

        switch ($cod) {
            case "Formacao-academica": 
                return response()->file('storage/' . $arquivos->formacao_academica);
                break;
            case "Experiencia-didatica": 
                return response()->file('storage/' . $arquivos->experiencia_didatica);
                break;
            case "Producao-cientifica":
                return response()->file('storage/' . $arquivos->producao_cientifica);
                break;
            case "Experiencia-profissional":
                return response()->file('storage/' . $arquivos->experiencia_profissional);
                break;
            default:
                return abort(404);
                break;
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
