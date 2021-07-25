<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arquivo;
use App\Models\Avaliacao;
use App\Models\Inscricao;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArquivoController extends Controller
{
    public function store(Request $request)
    {
        $arquivos = Arquivo::where('inscricoes_id', $request->inscricao)->first();

        if (!$arquivos) {
            Validator::make($request->all(), Arquivo::$rules, Arquivo::$messages)->validate();
        } else {
            Validator::make($request->all(), [
                'dados_pessoais'           => 'nullable|file|mimes:pdf|max:2048',
                'curriculum_vitae_lattes'  => 'nullable|file|mimes:pdf|max:2048',
                'formacao_academica'       => 'nullable|file|mimes:pdf|max:2048',
                'experiencia_didatica'     => 'nullable|file|mimes:pdf|max:2048',
                'producao_cientifica'      => 'nullable|file|mimes:pdf|max:2048',
                'experiencia_profissional' => 'nullable|file|mimes:pdf|max:2048',
            ], Arquivo::$messages)->validate();
        }

        $arquivos = Arquivo::where('inscricoes_id', $request->inscricao)->first();
        $inscricao = Inscricao::find($request->inscricao);
        $concurso = $inscricao->concurso;

        $path = 'concursos/' . $concurso->id . '/inscricoes/' . $request->inscricao . '/';
        $experiencia_didatica_arquivo = true;
        $producao_cientifica_arquivo = true;
        $experiencia_profissiona_arquivo = true;

        if (!$arquivos) {
            $this->saveDocument($concurso->id, $request->inscricao, $request->dados_pessoais, 'dados_pessoais.pdf');
            $this->saveDocument($concurso->id, $request->inscricao, $request->curriculum_vitae_lattes, 'curriculum_vitae_lattes.pdf');
            $this->saveDocument($concurso->id, $request->inscricao, $request->formacao_academica, 'formacao_academica.pdf');

            if ($request->experiencia_didatica) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_didatica, 'experiencia_didatica.pdf');
            } else {
                $experiencia_didatica_arquivo = false;
            }

            if ($request->producao_cientifica) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->producao_cientifica, 'producao_cientifica.pdf');
            } else {
                $producao_cientifica_arquivo = false;
            }

            if ($request->experiencia_profissional) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_profissional, 'experiencia_profissional.pdf');
            } else {
                $experiencia_profissiona_arquivo = false;
            }

            Arquivo::create([
                'dados_pessoais'           => $path . 'dados_pessoais.pdf',
                'curriculum_vitae_lattes'  => $path . 'curriculum_vitae_lattes.pdf',
                'formacao_academica'       => $path . 'formacao_academica.pdf',
                'experiencia_didatica'     => $experiencia_didatica_arquivo ? $path . 'experiencia_didatica.pdf' : null,
                'producao_cientifica'      => $producao_cientifica_arquivo ? $path . 'producao_cientifica.pdf' : null,
                'experiencia_profissional' => $experiencia_profissiona_arquivo ? $path . 'experiencia_profissional.pdf' : null,
                'inscricoes_id'            => $request->inscricao
            ]);
        } else {
            if ($request->dados_pessoais) {
                Storage::delete('public/' . $arquivos->dados_pessoais);
                $this->saveDocument($concurso->id, $request->inscricao, $request->dados_pessoais, 'dados_pessoais.pdf');
            }

            if ($request->curriculum_vitae_lattes) {
                Storage::delete('public/' . $arquivos->curriculum_vitae_lattes);
                $this->saveDocument($concurso->id, $request->inscricao, $request->curriculum_vitae_lattes, 'curriculum_vitae_lattes.pdf');
            }

            if ($request->formacao_academica) {
                Storage::delete('public/' . $arquivos->formacao_academica);
                $this->saveDocument($concurso->id, $request->inscricao, $request->formacao_academica, 'formacao_academica.pdf');
            }

            if ($request->experiencia_didatica && $arquivos->experiencia_didatica) {
                Storage::delete('public/' . $arquivos->experiencia_didatica);
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_didatica, 'experiencia_didatica.pdf');
            } else if ($request->experiencia_didatica) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_didatica, 'experiencia_didatica.pdf');
                $arquivos->experiencia_didatica = $path . 'experiencia_didatica.pdf';
            }

            if ($request->producao_cientifica && $arquivos->producao_cientifica) {
                Storage::delete('public/' . $arquivos->producao_cientifica);
                $this->saveDocument($concurso->id, $request->inscricao, $request->producao_cientifica, 'producao_cientifica.pdf');
            } else if ($request->producao_cientifica) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->producao_cientifica, 'producao_cientifica.pdf');
                $arquivos->producao_cientifica = $path . 'producao_cientifica.pdf';
            }

            if ($request->experiencia_profissional && $arquivos->experiencia_profissional) {
                Storage::delete('public/' . $arquivos->experiencia_profissional);
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_profissional, 'experiencia_profissional.pdf');
            } else if ($request->experiencia_profissional) {
                $this->saveDocument($concurso->id, $request->inscricao, $request->experiencia_profissional, 'experiencia_profissional.pdf');
                $arquivos->experiencia_profissional = $path . 'experiencia_profissional.pdf';
            }

            $arquivos->update();
        }

        return redirect()->route('candidato.index')->with('success', 'Seus documentos foram enviados 
            e serão examinados pela banca avaliadora.');
    }

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

    public function showFichaAvaliacao($avaliacao)
    {
        $avaliacao = Avaliacao::find($avaliacao);
        return response()->file('storage/' . $avaliacao->ficha_avaliacao);
    }

    public function downloadFichaAvaliacao($name)
    {
        $file = public_path() . "/anexo/" . $name;
        $headers = array('Content-Type: application/docx',);
        return Response::download($file, 'modelo_ficha_avaliacao.docx', $headers);
    }

    private function saveDocument($IDConcurso, $IDinscricao, $arquivo, $nome)
    {
        $path = 'concursos/' . $IDConcurso . '/inscricoes/' . $IDinscricao . '/';
        Storage::putFileAs('public/' . $path, $arquivo, $nome);
    }
}
