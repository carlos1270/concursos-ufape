<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConcursoRequest;
use App\Models\Arquivo;
use App\Models\Avaliacao;
use App\Models\Concurso;
use App\Models\Inscricao;
use App\Models\OpcoesVagas;
use App\Models\NotaDeTexto;
use App\Models\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ConcursoController extends Controller
{
    public function index()
    {
        $concursos = collect();
        if (auth()->user()->role == "presidenteBancaExaminadora") {
            $concursos = auth()->user()->concursosChefeBanca;
        } else {
            $concursos = auth()->user()->concursos;
        }
        return view('concurso.index', compact('concursos'));
    }

    public function create()
    {
        return view('concurso.create');
    }

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

    public function show($id)
    {
        $concurso = Concurso::find($id);
        $notas_aviso = $concurso->notas()->where('tipo', NotaDeTexto::ENUM_TIPO['aviso'])->get();
        $notas_notificacao = $concurso->notas()->where('tipo', NotaDeTexto::ENUM_TIPO['notificacao'])->get();
        $notas_resultado = $concurso->notas()->where('tipo', NotaDeTexto::ENUM_TIPO['resultado'])->get();
        $inscricao = null;
        if (Auth::check()) {
            $inscricao = Inscricao::where('concursos_id', $concurso->id)->where('users_id', Auth::user()->id)->first();
        }

        return view('concurso.show', compact('concurso', 'inscricao', 'notas_aviso', 'notas_notificacao', 'notas_resultado'));
    }

    public function edit($id)
    {
        $concurso = Concurso::find($id);
        $this->authorize('update', $concurso);
        return view('concurso.edit', compact('concurso'));
    }

    public function update(StoreConcursoRequest $request, $id)
    {
        $request->validated();
        $concurso = Concurso::find($id);
        $this->authorize('update', $concurso);
        $opcoesEditadas = OpcoesVagas::whereIn('id', $request->opcoes_id)->get();
        $opcoesExcluidas = $concurso->vagas->diff($opcoesEditadas);
        if ($opcoesExcluidas != null && $opcoesExcluidas->count() > 0 && $this->podeExcluir($opcoesExcluidas)) {
            return redirect()->back()->withErrors(['error' => 'A opção ' . $this->errorVaga($opcoesExcluidas)->nome . ' não pode ser excluída pois foi escolhida em algum agendamento'])->withInput();
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

    public function showCandidatos(Request $request)
    {
        $concurso = Concurso::find($request->concurso_id);
        
        if ($request->filtro != null) {
            $inscricoes = $this->filtrarInscricoes($request);
        } else {
            $inscricoes = Inscricao::where('concursos_id', $request->concurso_id)->orderBy('created_at', 'ASC')->get();
        }
        
        return view('concurso.show-candidatos', compact('inscricoes', 'concurso', 'request'));
    }

    public function inscricaoCandidato(Request $request)
    {
        $inscricao = Inscricao::find($request->inscricao_id);
        $candidato = $inscricao->user->candidato;
        $endereco = $inscricao->user->endereco;

        $listaCandidados = Inscricao::where('concursos_id', '=', $inscricao->concursos_id)->orderBy('created_at', 'ASC')->get();
        return view('concurso.avalia-inscricao-candidato', compact('inscricao', 'candidato', 'endereco', 'listaCandidados'));
    }

    public function aprovarReprovarCandidato(Request $request)
    {
        $inscricao = Inscricao::find($request->inscricao_id);
        $mensagem = "";

        if ($request->aprovar == "true") {
            $inscricao->status = "aprovado";
            $mensagem = "Candidato aprovado com sucesso!";
        } else if ($request->aprovar == "false") {
            $inscricao->status = "reprovado";
            $mensagem = "Candidato reprovado com sucesso!";
        }

        $inscricao->save();

        return redirect()->route('show.candidatos.concurso', $inscricao->id)->with('success', $mensagem);
    }

    public function avaliarDocumentosCandidato(Request $request)
    {
        $arquivos = Arquivo::where('inscricoes_id', $request->inscricao_id)->first();
        $inscricao = Inscricao::find($request->inscricao_id);
        return view('concurso.avalia-documentos-candidato')->with(['arquivos' => $arquivos, 'inscricao' => $inscricao]);
    }

    public function savePontuacaoDocumentosCandidato(Request $request)
    {
        $avaliacao = Avaliacao::where("inscricoes_id", $request->inscricao_id)->first();

        if (!$avaliacao) {
            Validator::make($request->all(), Avaliacao::$rules, Avaliacao::$messages)->validate();
        } else {
            Validator::make($request->all(), [
                'nota'            => 'numeric|min:0|max:100',
                'ficha_avaliacao' => 'file|mimes:pdf|max:2048'
            ], Avaliacao::$messages)->validate();
        }

        $inscricao = Inscricao::find($request->inscricao_id);

        if ($avaliacao && $request->ficha_avaliacao) {
            Storage::delete('public/' . $avaliacao->ficha_avaliacao);

            $path_ficha_avaliacao = 'concursos/' . $inscricao->concurso->id . '/inscricoes/' . $inscricao->id . '/avaliacao/';
            $nome_ficha_avaliacao = 'ficha_avaliacao.pdf';
            Storage::putFileAs('public/' . $path_ficha_avaliacao, $request->ficha_avaliacao, $nome_ficha_avaliacao);
        }

        if ($avaliacao && $request->nota) {
            $avaliacao->nota = $request->nota;
            $avaliacao->update();
        }

        if (!$avaliacao) {
            $path_ficha_avaliacao = 'concursos/' . $inscricao->concurso->id . '/inscricoes/' . $inscricao->id . '/avaliacao/';
            $nome_ficha_avaliacao = 'ficha_avaliacao.pdf';
            Storage::putFileAs('public/' . $path_ficha_avaliacao, $request->ficha_avaliacao, $nome_ficha_avaliacao);

            Avaliacao::create([
                'nota'            => $request->nota,
                'ficha_avaliacao' => $path_ficha_avaliacao . $nome_ficha_avaliacao,
                'inscricoes_id'   => $inscricao->id
            ]);
        }

        return redirect()->route('concurso.index')->with('mensage', 'Pontuação salva e ficha de avaliação salva com sucesso!');
    }

    public function showResultadoFinal(Request $request)
    {
        $inscricoes = Inscricao::where('concursos_id', $request->concurso_id)->get();
        $inscricoes = $inscricoes->sortBy('nota');

        return view('concurso.resultado-final', compact('inscricoes'));
    }

    public function AdicionarUserBanca($user_id, $concurso_id)
    {
        $concurso = Concurso::find($concurso_id);
        $this->authorize('operacoesUserBanca', $concurso);
        $concurso->chefeDaBanca()->attach($user_id);

        return redirect()->back()->with(['success' => "Usuário adicionado a banca do concurso."]);
    }

    public function RemoverUserBanca($user_id, $concurso_id)
    {
        $concurso = Concurso::find($concurso_id);
        $this->authorize('operacoesUserBanca', $concurso);
        $concurso->chefeDaBanca()->detach($user_id);

        return redirect()->back()->with(['success' => "Usuário removido da banca do concurso."]);
    }

    private function filtrarInscricoes(Request $request)
    {
        $inscricoes = Inscricao::where('concursos_id', $request->concurso_id)->orderBy('created_at', 'ASC')->get();

        $query = Candidato::query()->join('users', 'candidatos.users_id', '=', 'users.id');

        if ($request->check_cpf && $request->cpf != null) {
            $query = $query->where('cpf', 'ilike', "%".$request->cpf."%");

            $candidatos = $query->get();

            $inscricoes = Inscricao::where('concursos_id', $request->concurso_id)->whereIn('users_id', $candidatos->pluck('users_id'))->get();
        }
    
        return $inscricoes;
    }
}
