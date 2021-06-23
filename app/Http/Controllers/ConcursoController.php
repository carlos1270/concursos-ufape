<?php

namespace App\Http\Controllers;

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
        $concurso->salvarArquivos($request);
        $concurso->update();
        OpcoesVagas::criarOpcoesVagas($concurso, $request->opcoes_vaga);
        return redirect(route('concurso.index'))->with(['mensage' => 'Concurso criado com sucesso!']);
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
        $this->authorize('update', $concurso);
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
        $this->authorize('update', $concurso);
        $opcoesEditadas = OpcoesVagas::whereIn('id', $request->opcoes_id)->get();
        $opcoesExcluidas = $concurso->vagas->diff($opcoesEditadas);
        if ($opcoesExcluidas != null && $opcoesExcluidas->count() > 0 && $this->podeExcluir($opcoesExcluidas)) {
            return redirect()->back()->withErrors(['error' => 'A opção ' . $this->errorVaga($opcoesExcluidas)->nome . ' não pode ser excluida pois foi escolhida em algum agendamento'])->withInput();
        }

        $concurso->setAtributes($request);
        $concurso->salvarArquivos($request);
        $concurso->update();

        //Criando novas opções
        $novas_opcoes = [];
        foreach ($request->opcoes_id as $i => $id) {
            if ($id == 0) {
                array_push($novas_opcoes, $request->opcoes_vaga[$i]);
            }
        }
        if (count($novas_opcoes) > 0) {
            OpcoesVagas::criarOpcoesVagas($concurso, $novas_opcoes);
        }

        //Editando opções
        if ($opcoesEditadas != null && $opcoesEditadas->count() > 0) {
            foreach ($request->opcoes_id as $i => $id) {
                if ($id > 0) {
                    $opcao = OpcoesVagas::find($id);
                    $opcao->nome = $request->opcoes_vaga[$i];
                    $opcao->update();
                }
            }
        }

        //Excluindo opções
        if ($opcoesExcluidas != null && $opcoesExcluidas->count() > 0) {
            foreach ($opcoesExcluidas as $opExcluida) {
                $opExcluida->delete();
            }
        }

        // $horarios_disponiveis = array_diff($todos_os_horarios, $candidatos->pluck('chegada')->toArray());

        return redirect(route('concurso.index'))->with(['mensage' => 'Concurso salvo com sucesso!']);
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
        $this->authorize('delete', $concurso);
        $inscricoes = $concurso->inscricoes;

        if ($inscricoes != null && count($inscricoes) > 0) {
            return redirect()->back()->withErrors(['error' => 'O concurso não pode ser excluido, pois exitem inscrições para ele.'])->withInput();
        }

        OpcoesVagas::deletarOpcoesVagas($concurso);

        $concurso->deletar();

        return redirect(route('concurso.index'))->with(['mensage' => 'Concurso deletado com sucesso!']);
    }

    /*
        TODO 
        Checagem se não tem risco em excluir tal opção de seleção
        @param OpcoesVagas $opcao
        @return Boolean 
    */

    public function checarExclusao(OpcoesVagas $opcao)
    {
        $inscricoes = $opcao->inscricoes;

        if ($inscricoes != null && $inscricoes->count() > 0) {
            return true;
        }
        return false;
    }

    /*
        TODO
        Checar se alguma opção não pode ser excluida
        @param Collection $opcoes_vagas
        @return Boolean
    */

    public function podeExcluir($opcoes_vagas)
    {
        foreach ($opcoes_vagas as $vaga) {
            if ($this->checarExclusao($vaga)) {
                return true;
            }
        }
        return false;
    }

    /*
        TODO
        Retorna qual vaga não pode excluir
        @param Collection $opcoes_vagas
        @return OpcoesVaga $vaga
    */

    public function errorVaga($opcoes_vagas)
    {
        foreach ($opcoes_vagas as $vaga) {
            if ($this->checarExclusao($vaga)) {
                return $vaga;
            }
        }
        return null;
    }
}
