<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Inscricao;
use App\Models\Concurso;
use App\Models\OpcoesVagas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CandidatoController extends Controller
{
    public function showEnvioDocumentos()
    {
        return view('candidato.envio-documentos');
    }

    public function showInscricoes()
    {
        $inscricoes = Inscricao::where('users_id', Auth::user()->id)->get();

        return view('candidato.index')->with(['inscricoes' => $inscricoes]);
    }

    public function minhaInscricao(Request $request)
    {
        $inscricao = Inscricao::find($request->inscricao);
        $candidato = Candidato::where('users_id', Auth::user()->id)->first();
        $endereco = Endereco::where('users_id', Auth::user()->id)->first();

        return view('candidato.minha-inscricao')->with([
            'candidato' => $candidato, 'inscricao' => $inscricao,
            'endereco' => $endereco
        ]);
    }

    public function inscreverseConcurso($id)
    {
        $concurso = Concurso::find($id);
        $vagas = $concurso->vagas;

        $candidato = Candidato::where('users_id', Auth::user()->id)->first();

        return view('candidato.inscricao')->with(['vagas' => $vagas, 'candidato' => $candidato]);
    }

    public function saveInscricao(Request $request)
    {
        $request['pis'] = preg_replace('/[^0-9]/', '', $request['pis']);
        $request['rg'] = preg_replace('/[^0-9]/', '', $request['rg']);
        $request['cep'] = preg_replace('/[^0-9]/', '', $request['cep']);

        $candidatosRules = array_slice(Candidato::$rules, 2, 7);
        $candidatosMessages = array_slice(Candidato::$messages, 9, 21);

        Validator::make($request->all(), $candidatosRules, $candidatosMessages)->validate();

        Validator::make(
            $request->all(),
            Endereco::$rules,
            Endereco::$messages
        )->validate();

        Validator::make(
            $request->all(),
            Inscricao::$rules,
            Inscricao::$messages
        )->validate();

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

        return redirect()->route('show.inscricoes')->with('success', 'Sua inscrição foi realizada com sucesso');
    }
}
