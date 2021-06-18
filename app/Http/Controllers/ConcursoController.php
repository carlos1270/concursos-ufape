<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreConcursoRequest;
use App\Models\Concurso;
use App\Models\OpcoesVagas;

class ConcursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concursos = Concurso::all();
        return view('concurso.index', compact('concursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concurso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConcursoRequest $request)
    {
        $request->validated();
        $concurso = new Concurso;
        $concurso->setAtributes($request);
        $concurso->save();
        $concurso->salvarEdital($request->edital);
        $concurso->salvarModelos($request->modelos_documentos);
        $concurso->update();
        OpcoesVagas::criarOpcoesVagas($concurso, $request);
        return redirect( route('concurso.index') )->with(['mensage' => 'Concurso criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concurso = Concurso::find($id);
        return view('concurso.edit', compact('concurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreConcursoRequest $request, $id)
    {   
        $request->validated();
        $concurso = Concurso::find($id);
        $concurso->setAtributes($request);
        $concurso->salvarEdital($request->edital);
        $concurso->salvarModelos($request->modelos_documentos);
        $concurso->update();
        
        return redirect( route('concurso.index') )->with(['mensage' => 'Concurso salvo com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concurso = Concurso::find($id);
        $concurso->deletar();

        return redirect( route('concurso.index') )->with(['mensage' => 'Concurso deletado com sucesso!']);
    }
}
