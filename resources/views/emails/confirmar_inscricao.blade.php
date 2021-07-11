@extends('layouts.mail')

<html lang="en">

<body>

    <div style="background-color:#fff; border-radius:12px;height:750px;">
        <div style="margin-top: 1rem;margin-bottom:1rem;">
            <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#03A4E2;font-size:30px; margin-top:10px">Confirmação de inscrição</label>
        </div>
        <div><hr></div>
        <div style="background-color: #e2ffe4; padding:1.5rem; border-radius:12px" align="justify">
            <label style="color:#fff; font-family:Arial, Helvetica, sans-serif; font-weight:normal;font-size:21px; color:#076617; line-height:22px;">
                Aviso!<br><br>
                Prezado(a) candidato(a), sua inscrição foi realizada com sucesso, porém só será validada após a confirmação do pagamento da GRU. <b>Os(as) candidatos(as) que solicitaram isenção fiquem atentos(as) ao período de solicitação de isenção e homologação do resultado de isenção, para que, caso não seja validada a sua inscrição você consiga gerar o boleto (GRU) para pagamento da taxa.</b>  
                <br><br>
                Atenciosamente,<br>
                Comissão de Concurso Docente da UFAPE.<br><br>
                Qualquer dúvida entrar em contato pelo e-mail concurso.<br>
                concurso.docente@ufape.edu.br<br>
        </label>
        </div>

        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#03A4E2;font-size:22px; margin-top:20px">Informação do candidato</label>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:20px; margin-top:10px;">Nome e sobrenome: </label>
        <label style="font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>{{ Auth::user()->nome . ' ' . Auth::user()->sobrenome }}</b></label>
        
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#03A4E2;font-size:22px; margin-top:20px">Informações sobre a vaga</label>
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:20px; margin-top:10px;">Vaga escolhida: </label>
        <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>{{$inscricao->vaga->nome}}</b></label>
        
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:20px; margin-top:10px;">Solicitar isenção? </label>
        @if($inscricao->solicitou_isencao)
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Sim</b>, declaro que solicito a isenção de acordo com às condições estabelecidas no edital.</label>
        @else
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Não</b>.</label>
        @endif
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:20px; margin-top:10px;">Sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014, caso exista em Edital Específico.</label>
        @if($inscricao->cotista == "true")
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Sim</b>, sou declaradamente preto ou pardo e desejo concorrer à vaga reservada pela Lei no 12.990/2014.</label>
        @else
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Não</b>.</label>
        @endif
        <label style="float: left; width:100%; font-family: Arial, Helvetica, sans-serif; color:#000000; font-size:20px; margin-top:10px;">Portador de necessidades especiais?</label>
        @if($inscricao->pcd == "true")
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Sim</b>, sou portador de necessidades especiais.</label>
        @else
            <label style="float: left; width:100%;font-family: Arial, Helvetica, sans-serif; margin-top:-5px;color:#909090; font-size:19px"><b>Não</b>.</label>
        @endif
        <div style="float: left; width:100%; margin-top:2rem; margin-bottom:2rem; background-color:rgb(231, 252, 255); border-radius:12px; padding:1.5rem;">
            <a href="{{ route('candidato.show', $inscricao->id) }}" style="font-size:20px">Clique aqui</a><label style="font-size:20px"> para visualizar o formulário de inscrição pelo site.</label>
        </div>
        <div style="float: left; width:100%; margin-top:0.2rem; text-align:center">
            <a href="http://lmts.uag.ufrpe.br/" style="color: #909090">Sistema desenvolvido pelo Laboratório Multidisciplinar de Tecnologias Sociais - LMTS</a>
        </div>
        <div style="float: left; width:100%;margin-top:5rem; margin-bottom:5rem">
        </div>
    </div>
    
</body>
</html>