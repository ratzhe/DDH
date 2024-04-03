<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        ResetPassword::toMailUsing(function($notifiable, $url){
            $expiracao =  config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
            return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'), Lang::get('Discovery Diet & Health'))
            ->greeting('Olá!')
            ->subject(Lang::get('Notificação de Alteração de Senha'))
            ->line(Lang::get('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha da sua conta.'))
            ->action(Lang::get('Alterar Senha'), url('/reset-password/' .$url. '?email='.$notifiable->getEmailForPasswordReset()))
            ->line(Lang::get('Este link de redefinição de senha expirará em '.$expiracao.' minutos.'))
            ->line(Lang::get('Se você não solicitou uma redefinição de senha, desconsidere esse e-mail.'));
        });
    }
}
