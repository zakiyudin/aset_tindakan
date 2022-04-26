<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpiredStnkNotify extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $arrayPesan = [
            "header" => "Dear ".$notifiable->name,
            "body" => "Your STNK is expired, please renew it immediately, please click link below to see all data",
            "link" => "http://localhost:8000/kendaraan/expired",
            "footer" => "Thank you for using our application"
        ];
        return (new MailMessage)
                ->line($arrayPesan['header'])
                ->line($arrayPesan['body'])
                ->action('Data with Expired Date', url($arrayPesan['link']))
                ->line($arrayPesan['footer']);
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
