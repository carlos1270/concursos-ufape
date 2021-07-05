<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Candidato;
use App\Models\Inscricao;
use App\Models\Concurso;
use App\Models\OpcoesVagas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInscricaoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidatoController extends Controller
{
    public function showEnvioDocumentos($inscricao_id)
    {
        $arquivos = Arquivo::find($inscricao_id);
        return view('candidato.envio-documentos')->with(['inscricao' => $inscricao_id,
                                                         'arquivos' => $arquivos]);
    }

    public function index()
    {
        $inscricoes = Inscricao::where('users_id', Auth::user()->id)->get();
        return view('candidato.index', compact('inscricoes'));
    }

    public function show($id)
    {
        $inscricao = Inscricao::find($id);
        $this->authorize('view', $inscricao);

        return view('candidato.show')->with([
            'inscricao' => $inscricao,
        ]);
    }

    public function inscreverseConcurso($id)
    {
        $concurso = Concurso::find($id);
        $this->authorize('create', Inscricao::class);
        $vagas = $concurso->vagas;

        $candidato = Candidato::where('users_id', Auth::user()->id)->first();

        return view('candidato.inscricao', compact('vagas', 'candidato'));
    }

    public function saveInscricao(StoreInscricaoRequest $request)
    {
        $request->validated();
        $vagas = OpcoesVagas::find($request->vaga);

        if (!$vagas) {
            return redirect()->back()->with('vagas', 'Selecione uma vaga valida')->withInput();
        }

        $inscricao = new Inscricao();
        $inscricao->status = "Aguardando pagamento";
        $inscricao->cotista = $request->cotista;
        $inscricao->pcd = $request->pcd;
        $inscricao->solicitou_isencao = $request->desejo_isencao == "on";
        $inscricao->users_id = Auth::user()->id;
        $inscricao->concursos_id = $vagas->concursos_id;
        $inscricao->vagas_id = $vagas->id;
        $inscricao->save();

        return redirect()->route('candidato.index')->with('success', 'Sua inscrição foi realizada com sucesso');
    }

    public function saveDocumentos(Request $request)
    {
        Validator::make($request->all(), Arquivo::$rules, Arquivo::$messages)->validate();

        $arquivos = Arquivo::where('inscricoes_id', $request->inscricao)->first();
        $inscricao = Inscricao::find($request->inscricao);
        $concurso = $inscricao->concurso;

        if ($arquivos && $arquivos->formacao_academica) {
            Storage::delete('public/' . $arquivos->formacao_academica);
        }

        $path_formacao_academica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_formacao_academica = 'formacao_academica.pdf';
        Storage::putFileAs('public/' . $path_formacao_academica, $request->formacao_academica, $nome_formacao_academica);

        if ($arquivos && $arquivos->experiencia_didatica) {
            Storage::delete('public/' . $arquivos->experiencia_didatica);
        }

        $path_experiencia_didatica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_experiencia_didatica = 'experiencia_didatica.pdf';
        Storage::putFileAs('public/' . $path_experiencia_didatica, $request->experiencia_didatica, $nome_experiencia_didatica);

        if ($arquivos && $arquivos->producao_cientifica) {
            Storage::delete('public/' . $arquivos->producao_cientifica);
        }

        $path_producao_cientifica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_producao_cientifica = 'producao_cientifica.pdf';
        Storage::putFileAs('public/' . $path_producao_cientifica, $request->producao_cientifica, $nome_producao_cientifica);

        if ($arquivos && $arquivos->experiencia_profissional) {
            Storage::delete('public/' . $arquivos->experiencia_profissional);
        }

        $path_experiencia_profissional = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_experiencia_profissional = 'experiencia_profissional.pdf';
        Storage::putFileAs('public/' . $path_experiencia_profissional, $request->experiencia_profissional, $nome_experiencia_profissional);

        if (!$arquivos) {
            Arquivo::create([
                'formacao_academica'       => $path_formacao_academica . $nome_formacao_academica,
                'experiencia_didatica'     => $path_experiencia_didatica . $nome_experiencia_didatica,
                'producao_cientifica'      => $path_producao_cientifica . $nome_producao_cientifica,
                'experiencia_profissional' => $path_experiencia_profissional . $nome_experiencia_profissional,
                'inscricoes_id'            => $request->inscricao
            ]);
        } else if ($arquivos != null) {
            $arquivos->formacao_academica = $path_formacao_academica . $nome_formacao_academica;
            $arquivos->experiencia_didatica = $path_experiencia_didatica . $nome_experiencia_didatica;
            $arquivos->producao_cientifica = $path_producao_cientifica . $nome_producao_cientifica;
            $arquivos->experiencia_profissional = $path_experiencia_profissional . $nome_experiencia_profissional;
            $arquivos->inscricoes_id = $request->inscricao;
            $arquivos->update();
        }

        return redirect()->route('candidato.index')->with('success', 'Seus documentos foram enviados 
            e serão examinados pela banca avaliadora.');
    }
}
