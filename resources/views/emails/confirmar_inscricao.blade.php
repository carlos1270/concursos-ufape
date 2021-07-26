@extends('layouts.mail')

<html lang="en">

<body>

    <div style="background-color:#fff; border-radius:12px;height:750px;">
        <div style="margin-top: 1rem;margin-bottom:1rem;">
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:black;font-size:20px; margin-top:10px">Prezado(a) {{$inscricao->user->nome . ' ' . $inscricao->user->sobrenome}},</label>
        </div>
        <div><br></div>
        <div style="margin-top: 1rem; margin-bottom:4rem;">
            <span style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:black;font-size:20px; margin-top:10px">Sua inscrição nº {{$inscricao->id}} no(a) {{$inscricao->concurso->titulo}} foi realizada com sucesso!</span>
        </div>
        <div><br></div>
        <div style="padding:1.5rem; border-radius: 5px; border: 1px solid rgb(255, 63, 63); text-align: justify;">
            <label style="color:#fff; font-family:Arial, Helvetica, sans-serif; font-weight:normal;font-size:16px; color: black; line-height:22px;">
                <b>Atente-se aos seguintes avisos:</b><br>
                <ul>
                    <li>
                        A sua inscrição só será validada após a confirmação do pagamento da GRU, caso não seja isento.
                    </li>
                    <li>
                        Caso tenha solicitado isenção, fique atento(a) ao período de solicitação de isenção e homologação do resultado de isenção, que será publicada no site da Universidade Federal do Agreste de Pernambuco (UFAPE), na seção Concursos.
                    </li>
                    <li>
                        Qualquer dúvida entrar em contato pelo e-mail do setor de concursos: <a href="mailto:concurso.docente@ufape.edu.br">concurso.docente@ufape.edu.br</a>
                    </li>
                </ul>
            </label>
        </div>
        <br>
        <b style="font-size:16px; color:#000000;">Os dados da sua inscrição foram os seguintes:</b><br>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:16px; margin-top:10px;"><b>Nome e sobrenome: </b></label>
        <label style="font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">{{ Auth::user()->nome . ' ' . Auth::user()->sobrenome }}</label>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:16px; margin-top:10px;"><b>Vaga escolhida: </b></label>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">{{$inscricao->vaga->nome}}</label>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:16px; margin-top:10px;"><b>Solicitar isenção? </b></label>
        @if($inscricao->solicitou_isencao)
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Sim, declaro que solicito a isenção de acordo com às condições estabelecidas no edital.</label>
        @else
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Não.</label>
        @endif
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:16px; margin-top:10px;"><b>Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso exista em Edital Específico.</b></label>
        @if($inscricao->cotista == "true")
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Sim, sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014.</label>
        @else
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Não.</label>
        @endif
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:16px; margin-top:10px;"><b>Portador de necessidades especiais?</b></label>
        @if($inscricao->pcd == "true")
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Sim, sou portador de necessidades especiais.</label>
        @else
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#000000; font-size:16px">Não.</label>
        @endif
        <br>
        <div style="float: left; width: 94.5%; border-radius:5px; border: 1px solid rgb(255, 63, 63); padding:1.5rem; margin-top:15px; margin-bottom:15px;">
            <a href="{{ route('candidato.show', $inscricao->id) }}" style="font-size:16px">Clique aqui</a><span style="font-size: 16px;"> para visualizar o formulário de inscrição pelo site.</span>
        </div>
        <br>
        <div style="font-family: Arial, Helvetica, sans-serif; font-size:16px; float: left; width:100%; margin-top: 15px; text-align:left">
            <span style="color: #909090">
                @lang('Regards') <br>
                <br>
                {{ config('app.name') }}<br>
                Laboratório Multidisciplinar de Tecnologias Sociais<br>
                Universidade Federal do Agreste de Pernambuco
            </span>
        </div>
        <div style="float: left; width:100%;margin-top:5rem; margin-bottom:5rem">
        </div>
    </div>
</body>
</html>