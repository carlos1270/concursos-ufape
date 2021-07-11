@component('mail::message')
{{-- Greeting --}}
# @lang('Hello!') {{$user->nome . " ". $user->sobrenome}}!
Pedimos que clique no botão abaixo para verificar seu endereço de e-mail. Esta ação é necessária para evitar a criação de usuários falsos, robôs ou mesmo o uso indevido de seu acesso por terceiros.
@component('mail::button', ['url' => $route_verificar, 'color' => "primary"])
Verifique o endereço de e-mail
@endcomponent
<div style="font-size: 16px;">
Se você não solicitou a criação desta conta, ignore este e-mail.<br>
@lang('Regards')<br>
<br>
{{ config('app.name') }}<br>
Laboratório Multidisciplinar de Tecnologias Sociais<br>
Universidade Federal do Agreste de Pernambuco
</div>
@endcomponent