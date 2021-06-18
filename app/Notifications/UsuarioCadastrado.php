<?php

namespace App\Notifications;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class UsuarioCadastrado extends Notification
{
    use Queueable;

    public static $createUrlCallback;
    public static $toMailCallback;

    private $usuario;
    private $linha_p1, $linha_p2, $linha_p3, $linha_p4, $linha_p5;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $usuario)
    {
        $this->usuario = $usuario;
        $this->linha_p1 = "Sr(a). " . $this->usuario->nome . ",";
        $this->linha_p2 = "Informamos que você foi cadastrado no Concursos-UFAPE";
        $this->linha_p3 = "Suas informações de login são: ";
        $this->linha_p4 = "Login: " . $this->usuario->nome;
        $this->linha_p5 = "Senha: " . $this->usuario->password;
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
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->from(env('MAIL_USERNAME'), 'Concursos-UFAPE')
            ->subject(Lang::get('Confirmação de conta'))
            ->line($this->linha_p1)
            ->line($this->linha_p2)
            ->line($this->linha_p3)
            ->line($this->linha_p4)
            ->line($this->linha_p5)
            ->action('Clique no link para verificar a sua conta', $verificationUrl);
    }

    protected function verificationUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable);
        }

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
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
