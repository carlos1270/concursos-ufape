<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Candidato;
use App\Models\Inscricao;
use App\Models\Concurso;
use App\Models\OpcoesVagas;
use App\Http\Requests\StoreInscricaoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConfirmarInscricao;

class CandidatoController extends Controller
{
    public function showEnvioDocumentos($id)
    {
        $arquivos = Arquivo::where('inscricoes_id', $id)->first();
        $inscricao = Inscricao::find($id);
        return view('candidato.envio-documentos')->with([
            'inscricao' => $inscricao,
            'arquivos' => $arquivos
        ]);
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
        $this->authorize('create', Inscricao::class);
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

        Notification::send(auth()->user(), new ConfirmarInscricao($inscricao));

        return redirect()->route('candidato.index')->with('success', 'Sua inscrição foi realizada com sucesso');
    }
}
