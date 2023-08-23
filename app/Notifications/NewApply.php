<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewApply extends Notification
{
    use Queueable;

    public $vacante_id;
    public $name_vacante;
    public $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacante_id, $name_vacante, $user_id)
    {
        $this->vacante_id = $vacante_id;
        $this->name_vacante = $name_vacante;
        $this->user_id = $user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {   
        $url = url("/notifications");
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('Vacante: '.$this->name_vacante)
                    ->action('Ver notificaciones', $url)
                    ->line('Gracias por usar Devjobs!');
    }

    /**
     * Save notifications in a database
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'vacante_id' => $this->vacante_id,
            'name_vacante' => $this->name_vacante,
            'user_id' => $this->user_id,
        ];
    }
}
