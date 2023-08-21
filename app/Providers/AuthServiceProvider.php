<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Config the info that is send in the email
        VerifyEmail::toMailUsing(function ($notifiable, $url) {

            //1. Create a mail message class
            // 2.Customize the subject
            // 3.Escribir linea del correo
            // 4. implements the button with action method an past two params 1.message, 2.url 
            // 5. End of message
            return (new MailMessage)
                ->subject('Verificar cuenta')
                ->line('Tu cuenta esta casi lista pulsa el boton para verificar tu cuenta')
                ->action('Confirma tu cuenta', $url)
                ->line('Si no creaste esta cuenta ignora el mensaje');
        });
    }
}
