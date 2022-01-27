<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\TindakanAsetModel;
use Carbon\Carbon;
use App\Notifications\NotifyExpiredDate;

class CronTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trying to send email automatic';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users = User::all();
        // foreach ($users as $user) {
            $date_now = Carbon::now();
            $tanggal_expired = TindakanAsetModel::pluck('tanggal_expired');
            foreach ($tanggal_expired as $expired) {
                if($expired < $date_now){
                    \Log::info('Expired');
                    $users = User::all();
                    foreach ($users as $user) {
                        # code...
                        $user->notify(new NotifyExpiredDate($expired));
                    }
                }else{
                    \Log::info('Not Expired');
                }
            }

            // foreach ($tanggal_expired as $tgl => $value) {
            //     # code...
            //     // return $value->tanggal_expired;
            //     if($value->tanggal_pembelian < $value->tanggal_expired){
            //         \Log::info("expired");
            //         $users = User::all();
            //         foreach ($users as $user) {
            //             # code...
            //             $user->notify(new NotifyExpiredDate($value));
            //         }
            //     }else{
            //         \Log::info("not expired");
            //     }
            // }
           
            
        
        // }
        
        \Log::info('Cron Is Working');
    }
}
