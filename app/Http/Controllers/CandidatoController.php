<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Inscricao;
use App\Models\OpcoesVagas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidatoController extends Controller
{
    public function showEnvioDocumentos(Request $request)
    {
        return view('candidato.envio-documentos')->with('inscricao', $request->inscricao_id);
    }

    public function index()
    {
        $inscricoes = Inscricao::where('users_id', Auth::user()->id)->get();
        return view('candidato.index', compact('inscricoes'));
    }

    public function show($id)
    {
        $inscricao = Inscricao::find($id);
        $candidato = Candidato::where('users_id', Auth::user()->id)->first();
        $endereco = Endereco::where('users_id', Auth::user()->id)->first();

        return view('candidato.show', compact('inscricao', 'candidato', 'endereco'));
    }

    public function inscreverseConcurso(Request $request)
    {
        $vagas = OpcoesVagas::where('concursos_id', $request->concurso_id)->get();
        $candidato = Candidato::where('users_id', Auth::user()->id)->first();

        return view('candidato.inscricao', compact('vagas', 'candidato'));
    }

    public function saveInscricao(Request $request)
    {
        $request['pis'] = preg_replace('/[^0-9]/', '', $request['pis']);
        $request['rg'] = preg_replace('/[^0-9]/', '', $request['rg']);
        $request['cep'] = preg_replace('/[^0-9]/', '', $request['cep']);

        $candidatosRules = array_slice(Candidato::$rules, 2, 7);
        $candidatosMessages = array_slice(Candidato::$messages, 9, 21);

        Validator::make($request->all(), $candidatosRules, $candidatosMessages)->validate();

        Validator::make($request->all(), Endereco::$rules, Endereco::$messages)->validate();

        Validator::make($request->all(), Inscricao::$rules, Inscricao::$messages)->validate();

        if (is_string($request['vagas']) && !is_numeric($request['vagas'])) {
            return redirect()->back()->with('vagas', 'Selecione uma vaga valida')->withInput();
        }

        $vagas = OpcoesVagas::find($request['vagas']);

        if (!$vagas) {
            return redirect()->back()->with('vagas', 'Selecione uma vaga valida')->withInput();
        }

        $candidato = Candidato::where('users_id', Auth::user()->id)->first();
        $candidato->fill($request->all());
        $candidato->save();

        Endereco::create([
            'cep' => $request['cep'],
            'rua' => $request['rua'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'users_id' => Auth::user()->id
        ]);

        Inscricao::create([
            'status' => "primeira fase",
            'titulacao' => $request['titulacao'],
            'cotista' => $request['cotista'],
            'area_conhecimento' => $request['area_conhecimento'],
            'pcd' => $request['pcd'],
            'users_id' =>  Auth::user()->id,
            'concursos_id' => $vagas->concursos_id,
            'vagas_id' => $vagas->id
        ]);

        return redirect()->route('candidato.index')->with('success', 'Sua inscrição foi realizada com sucesso');
    }

    public function saveDocumentos(Request $request)
    {
        Validator::make($request->all(), Arquivo::$rules, Arquivo::$messages)->validate();

        $path_formacao_academica = 'concursos/inscricao/' . Auth::user()->nome . '/' . $request->inscricao . '/';
        $nome_formacao_academica = 'formacao_academica.pdf';
        Storage::putFileAs('public/' . $path_formacao_academica, $request->formacao_academica, $nome_formacao_academica);

        $path_experiencia_didatica = 'concursos/inscricao/' . Auth::user()->nome . '/' . $request->inscricao . '/';
        $nome_experiencia_didatica = 'experiencia_didatica.pdf';
        Storage::putFileAs('public/' . $path_experiencia_didatica, $request->experiencia_didatica, $nome_experiencia_didatica);

        $path_producao_cientifica = 'concursos/inscricao/' . Auth::user()->nome . '/' . $request->inscricao . '/';
        $nome_producao_cientifica = 'producao_cientifica.pdf';
        Storage::putFileAs('public/' . $path_producao_cientifica, $request->producao_cientifica, $nome_producao_cientifica);

        $path_experiencia_profissional = 'concursos/inscricao/' . Auth::user()->nome . '/' . $request->inscricao . '/';
        $nome_experiencia_profissional = 'experiencia_profissional.pdf';
        Storage::putFileAs('public/' . $path_experiencia_profissional, $request->experiencia_profissional, $nome_experiencia_profissional);

        Arquivo::create([
            'formacao_academica'       => $path_formacao_academica . $nome_formacao_academica,
            'experiencia_didatica'     => $path_experiencia_didatica . $nome_experiencia_didatica,
            'producao_cientifica'      => $path_producao_cientifica . $nome_producao_cientifica,
            'experiencia_profissional' => $path_experiencia_profissional . $nome_experiencia_profissional,
            'inscricoes_id'            =>  $request->inscricao
        ]);

        return redirect()->route('candidato.index')->with('success', 'Seus documentos foram enviados 
            e serão examinados pela banca pela banca avaliadora.');
    }
}
