<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class EnvioDocumentosNotification extends Notification
{
    use Queueable;

    private $usuario;
    private $linha_p1, $linha_p2;

    public function __construct(User $usuario, $atualizacao)
    {
        $this->usuario = $usuario;
        $this->linha_p1 = "Sr(a). " . $this->usuario->nome . ",";
        if (!$atualizacao)
            $this->linha_p2 = "Informamos que os documentos para a fase de avaliação de títulos foram enviados com sucesso!";
        else
            $this->linha_p2 = "Informamos que os documentos para a fase de avaliação de títulos foram atualizados com sucesso!";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Envio de documentos'))
            ->line($this->linha_p1)
            ->line($this->linha_p2);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
