<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\TindakanAsetModel;
use Carbon\Carbon;
use App\Notifications\NotifyExpiredDate;
use App\Notifications\ExpiredAsuransiNotify;
use App\Notifications\ExpiredKirNotify;
use App\Notifications\ExpiredPajakStnkNotify;
use App\Notifications\ExpiredStnkNotify;
use App\Models\Kendaraan\KendaraanModel;
use Illuminate\Support\Facades\Gate;

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
            $tgl_exp_asuransi = KendaraanModel::pluck('tgl_ex_asuransi');
            $tgl_exp_stnk = KendaraanModel::pluck('tgl_ex_stnk');
            $tgl_exp_pajak_stnk = KendaraanModel::pluck('tgl_ex_pajak_stnk');
            $tgl_exp_kir = KendaraanModel::pluck('tgl_ex_kir');
            $user = User::all();

            $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                        ->where('tgl_ex_asuransi', '<=' ,$date_now)
                        ->orWhere('tgl_ex_stnk', '<=' ,$date_now)
                        ->orWhere('tgl_ex_pajak_stnk', '<=' ,$date_now)
                        ->orWhere('tgl_ex_kir', '<=' ,$date_now)
                        ->get();

            
            if($data !== null){
                \Log::info('ada data yang expired');
                foreach ($user as $user_email) {
                    # code...
                    // send email to a few users
                    if($user_email->role == 'admin'){
                        \Log::info('email terkirim ke '.$user_email->email);
                        $user_email->notify(new NotifyExpiredDate($data));
                    }
                }
            }else{
                \Log::info('tidak ada data yang expired');
            }
            
            // foreach ($tgl_exp_asuransi as $exp_asuransi) {
            //     if($exp_asuransi < $date_now){
            //         if($exp_asuransi != null){
            //             \Log::info("Expired Asuransi");
            //             foreach ($user as $user_email) {
            //                 # code...
            //                 $user_email->notify(new ExpiredAsuransiNotify($user_email));
            //             }
            //         }else{
            //             \Log::info("Tgl Asuransi Kosong");
            //         }
            //     }
            // }
            // foreach ($tgl_exp_stnk as $exp_stnk) {
            //     # code...
            //     if($exp_stnk < $date_now){
            //         if($exp_stnk != null){
            //             \Log::info("Expired STNK");
            //             foreach ($user as $user_email) {
            //                 # code...
            //                 $user_email->notify(new ExpiredStnkNotify($user_email));
            //             }
            //         }else{
            //             \Log::info("Tgl STNK Kosong");
            //         }
            //     }
            // }
            // foreach ($tgl_exp_kir as $exp_kir) {
            //     # code...
            //     if($exp_kir < $date_now){
            //         if($exp_kir != null){
            //             \Log::info("Expired KIR");
            //             foreach ($user as $user_email) {
            //                 # code...
            //                 $user_email->notify(new ExpiredKirNotify($user_email));
            //             }
            //         }else{
            //             \Log::info("Tgl KIR Kosong");
            //         }
            //     }
            // }
            // foreach ($tgl_exp_pajak_stnk as $exp_pajak_stnk) {
            //     # code...
            //     if($exp_pajak_stnk < $date_now){
            //         if($exp_pajak_stnk != null){
            //             \Log::info("Expired PAJAK STNK");
            //             foreach ($user as $user_email) {
            //                 # code...
            //                 $user_email->notify(new ExpiredPajakStnkNotify($user_email));
            //             }
            //         }else{
            //             \Log::info("Tgl PAJAK STNK Kosong");
            //         }
            //     }
            // }

            // $date_now = Carbon::now();
            // $tanggal_expired = TindakanAsetModel::pluck('tanggal_expired');
            // foreach ($tanggal_expired as $expired) {
            //     if($expired < $date_now){
            //         \Log::info('Expired');
            //         $users = User::all();
            //         foreach ($users as $user) {
            //             # code...
            //             $user->notify(new NotifyExpiredDate($expired));
            //         }
            //     }else{
            //         \Log::info('Not Expired');
            //     }
            // }

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
