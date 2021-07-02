<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Endereco;
use App\Models\Inscricao;
use App\Models\Concurso;
use App\Models\OpcoesVagas;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInscricaoRequest;
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
        $this->authorize('view', $inscricao);
        // $candidato = Candidato::where('users_id', Auth::user()->id)->first();
        // $endereco = Endereco::where('users_id', Auth::user()->id)->first();

        return view('candidato.minha-inscricao')->with([
            'inscricao' => $inscricao,
        ]);
    }

    public function inscreverseConcurso($id)
    {
        $concurso = Concurso::find($id);
        $this->authorize('create', Inscricao::class);
        $vagas = $concurso->vagas;

        $candidato = Candidato::where('users_id', Auth::user()->id)->first();

        return view('candidato.inscricao')->with(['vagas' => $vagas, 'candidato' => $candidato]);
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

        return redirect()->route('show.inscricoes')->with('success', 'Sua inscrição foi realizada com sucesso');
    }
}
