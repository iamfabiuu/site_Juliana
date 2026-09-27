<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            return (new MailMessage)
                ->subject('Recuperação de Senha')
                ->greeting('Olá!')
                ->line('Você está recebendo este e-mail porque recebemos uma solicitação de recuperação de senha para sua conta.')
                ->action('Redefinir Senha', $url)
                ->line('Este link de recuperação de senha expirará em 60 minutos.')
                ->line('Se você não solicitou a recuperação de senha, nenhuma ação é necessária.')
                ->salutation('Atenciosamente, ' . config('app.name'));
        });
    }
}
