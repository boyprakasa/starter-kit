<?php

namespace App\Notifications\Permohonan\Internal;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDocument extends Notification
{
    use Queueable;

    protected $service;
    protected $applicant;
    protected $register;
    protected $description;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($service, $applicant, $register, $description = null)
    {
        $this->service = $service;
        $this->applicant = $applicant;
        $this->register = $register;
        $this->description = $description;
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
            ->subject('Andalalin - Pengajuan Permohonan Baru!')
            ->view('email.internal.new-document', [
                'service' => $this->service,
                'applicant' => $this->applicant,
                'register' => $this->register,
                'description' => $this->description,
            ]);
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
