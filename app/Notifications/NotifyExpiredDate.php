<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Kendaraan\KendaraanModel;
use Carbon\Carbon;

class NotifyExpiredDate extends Notification
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
        $email = $notifiable->email;
        $date_now = Carbon::now();
        $dateNowParse = Carbon::parse($date_now);

        $asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        $kir = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        $stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();

            return (new MailMessage)
                        ->subject('Pemberitahuan Pemakaian Kendaraan')
                        ->greeting('Hai '.$notifiable->name)
                        ->action('Selengkapnya !!', route('kendaraan.expired'))
                        ->markdown('vendor.notifications.expired', compact('asuransi', 'email', 'pajak_stnk', 'kir', 'stnk'));
                    
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
