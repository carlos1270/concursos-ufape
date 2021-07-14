<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arquivo;
use App\Models\Avaliacao;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        Validator::make($request->all(), Arquivo::$rules, Arquivo::$messages)->validate();

        $arquivos = Arquivo::where('inscricoes_id', $request->inscricao)->first();
        $inscricao = Inscricao::find($request->inscricao);
        $concurso = $inscricao->concurso;

        if ($arquivos && $arquivos->curriculum_vitae_lattes) {
            Storage::delete('public/' . $arquivos->dados_pessoais);
        }

        $path_dados_pessoais = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_dados_pessoais = 'curriculum_vitae_lattes.pdf';
        Storage::putFileAs('public/' . $path_dados_pessoais, $request->dados_pessoais, $nome_dados_pessoais);

        if ($arquivos && $arquivos->curriculum_vitae_lattes) {
            Storage::delete('public/' . $arquivos->curriculum_vitae_lattes);
        }

        $path_curriculum_vitae_lattes = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_curriculum_vitae_lattes = 'curriculum_vitae_lattes.pdf';
        Storage::putFileAs('public/' . $path_curriculum_vitae_lattes, $request->curriculum_vitae_lattes, $nome_curriculum_vitae_lattes);

        if ($arquivos && $arquivos->formacao_academica) {
            Storage::delete('public/' . $arquivos->formacao_academica);
        }

        $path_formacao_academica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $nome_formacao_academica = 'formacao_academica.pdf';
        Storage::putFileAs('public/' . $path_formacao_academica, $request->formacao_academica, $nome_formacao_academica);

        if ($arquivos && $arquivos->experiencia_didatica) {
            Storage::delete('public/' . $arquivos->experiencia_didatica);
        }

        if ($request->experiencia_didatica) {
            $path_experiencia_didatica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_experiencia_didatica = 'experiencia_didatica.pdf';
            Storage::putFileAs('public/' . $path_experiencia_didatica, $request->experiencia_didatica, $nome_experiencia_didatica);
        } else {
            $path_experiencia_didatica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_experiencia_didatica = '';
        }

        if ($arquivos && $arquivos->producao_cientifica) {
            Storage::delete('public/' . $arquivos->producao_cientifica);
        }

        if ($request->producao_cientifica) {
            $path_producao_cientifica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_producao_cientifica = 'producao_cientifica.pdf';
            Storage::putFileAs('public/' . $path_producao_cientifica, $request->producao_cientifica, $nome_producao_cientifica);
        } else {
            $path_producao_cientifica = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_producao_cientifica = '';
        }

        if ($arquivos && $arquivos->experiencia_profissional) {
            Storage::delete('public/' . $arquivos->experiencia_profissional);
        }

        if ($request->experiencia_profissional) {
            $path_experiencia_profissional = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_experiencia_profissional = 'experiencia_profissional.pdf';
            Storage::putFileAs('public/' . $path_experiencia_profissional, $request->experiencia_profissional, $nome_experiencia_profissional);
        } else {
            $path_experiencia_profissional = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
            $nome_experiencia_profissional = '';
        }

        if (!$arquivos) {
            Arquivo::create([
                'dados_pessoais'           => $path_dados_pessoais . $nome_dados_pessoais,
                'curriculum_vitae_lattes'  => $path_curriculum_vitae_lattes . $nome_curriculum_vitae_lattes,
                'formacao_academica'       => $path_formacao_academica . $nome_formacao_academica,
                'experiencia_didatica'     => $nome_experiencia_didatica != '' ? $path_experiencia_didatica . $nome_experiencia_didatica : null,
                'producao_cientifica'      => $nome_producao_cientifica != '' ? $path_producao_cientifica . $nome_producao_cientifica : null,
                'experiencia_profissional' => $nome_experiencia_profissional != '' ? $path_experiencia_profissional . $nome_experiencia_profissional : null,
                'inscricoes_id'            => $request->inscricao
            ]);
        } else if ($arquivos != null) {
            $arquivos->dados_pessoais = $path_dados_pessoais . $nome_dados_pessoais;
            $arquivos->curriculum_vitae_lattes = $path_curriculum_vitae_lattes . $nome_curriculum_vitae_lattes;
            $arquivos->formacao_academica = $path_formacao_academica . $nome_formacao_academica;
            $arquivos->experiencia_didatica = $nome_experiencia_didatica != '' ? $path_experiencia_didatica . $nome_experiencia_didatica : null;
            $arquivos->producao_cientifica = $nome_producao_cientifica != '' ? $path_producao_cientifica . $nome_producao_cientifica : null;
            $arquivos->experiencia_profissional = $nome_experiencia_profissional != '' ? $path_experiencia_profissional . $nome_experiencia_profissional : null;
            $arquivos->inscricoes_id = $request->inscricao;
            $arquivos->update();
        }

        return redirect()->route('candidato.index')->with('success', 'Seus documentos foram enviados 
            e serão examinados pela banca avaliadora.');
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
            case "Dados-pessoais":
                return Storage::disk()->exists('public/' . $arquivos->dados_pessoais) ? response()->file('storage/' . $arquivos->dados_pessoais) : abort(404);
                break;
            case "Lattes":
                return Storage::disk()->exists('public/' . $arquivos->curriculum_vitae_lattes) ? response()->file('storage/' . $arquivos->curriculum_vitae_lattes) : abort(404);
                break;
            case "Formacao-academica":
                return Storage::disk()->exists('public/' . $arquivos->formacao_academica) ? response()->file('storage/' . $arquivos->formacao_academica) : abort(404);
                break;
            case "Experiencia-didatica":
                return Storage::disk()->exists('public/' . $arquivos->experiencia_didatica) && $arquivos->experiencia_didatica != null ? response()->file('storage/' . $arquivos->experiencia_didatica) : abort(404);
                break;
            case "Producao-cientifica":
                return Storage::disk()->exists('public/' . $arquivos->producao_cientifica) && $arquivos->producao_cientifica != null ? response()->file('storage/' . $arquivos->producao_cientifica) : abort(404);
                break;
            case "Experiencia-profissional":
                return Storage::disk()->exists('public/' . $arquivos->experiencia_profissional) && $arquivos->experiencia_profissional != null ? response()->file('storage/' . $arquivos->experiencia_profissional) : abort(404);
                break;
            default:
                return abort(404);
                break;
        }
        return abort(404);
    }

    public function showFichAvaliacao($avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);

        return response()->file('storage/' . $avaliacao->ficha_avaliacao);
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
