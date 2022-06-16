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

            $date_now = Carbon::now();
            $tgl_exp_asuransi = KendaraanModel::pluck('tgl_ex_asuransi');
            $tgl_exp_stnk = KendaraanModel::pluck('tgl_ex_stnk');
            $tgl_exp_pajak_stnk = KendaraanModel::pluck('tgl_ex_pajak_stnk');
            $tgl_exp_kir = KendaraanModel::pluck('tgl_ex_kir');
            $user = User::all();

            // $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
            //             ->where('tgl_ex_asuransi', '<=' ,$date_now)
            //             ->orWhere('tgl_ex_stnk', '<=' ,$date_now)
            //             ->orWhere('tgl_ex_pajak_stnk', '<=' ,$date_now)
            //             ->orWhere('tgl_ex_kir', '<=' ,$date_now)
            //             ->get();
            $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();

            
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
        
        \Log::info('Cron Is Working');
    }
}
