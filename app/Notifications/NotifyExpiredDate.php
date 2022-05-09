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
        $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                    ->where('tgl_ex_asuransi', '<=' ,$date_now)
                    ->orWhere('tgl_ex_stnk', '<=' ,$date_now)
                    ->orWhere('tgl_ex_pajak_stnk', '<=' ,$date_now)
                    ->orWhere('tgl_ex_kir', '<=' ,$date_now)
                    ->get();
        $asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                    ->where('tgl_ex_asuransi', '<=' ,$date_now)
                    ->get()->count();
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                    ->where('tgl_ex_pajak_stnk', '<=' ,$date_now)
                    ->get()->count();
        $kir = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                    ->where('tgl_ex_kir', '<=' ,$date_now)
                    ->get()->count();
        $stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                    ->where('tgl_ex_stnk', '<=' ,$date_now)
                    ->get()->count();

        $image = asset('img/unnamed.png');

        return (new MailMessage)
                    ->subject('Pemberitahuan Pemakaian Kendaraan')
                    ->greeting('Hai '.$notifiable->name)
                    ->line('Berikut ini adalah daftar kendaraan yang akan kadaluarsa pada tanggal '.$date_now)
                    ->line('Jumlah kendaraan yang akan kadaluarsa asuransi : '.$asuransi)
                    ->line('Jumlah kendaraan yang akan kadaluarsa pajak stnk : '.$pajak_stnk)
                    ->line('Jumlah kendaraan yang akan kadaluarsa kir : '.$kir)
                    ->line('Jumlah kendaraan yang akan kadaluarsa stnk : '.$stnk)
                    ->line('Silahkan login ke aplikasi untuk melakukan pembayaran')
                    ->theme('default')
                    ->action('Login', url('http://localhost:8000/login'))
                    ->markdown('vendor.notifications.email', compact('data', 'email', 'asuransi', 'pajak_stnk', 'kir', 'stnk', 'image'));
                    
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
