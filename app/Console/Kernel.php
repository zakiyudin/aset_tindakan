<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Jobs\SendEmailJob;
use App\Models\Kendaraan\KendaraanModel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\WordOfTheDay::class,
        Commands\CronTest::class,
    ];
    
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('word:day')->daily();
        $schedule->command('test:send-email');
        $tgl_asuransi = KendaraanModel::pluck('tgl_ex_asuransi');
        
        // $schedule->command('test:send-email')
        //     ->when(function(){
        //         foreach ($tgl_asuransi as $exp_date ) {
        //             # code...
        //             if($exp_date != null){
        //                 $exp = new Carbon($exp_date);
        //                 date_sub($exp, date_interval_create_from_date_string('7 days'));
        //                 return $exp->format('Y-m-d');
        //             }
        //         }
        //     })
        //     ->at('08:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
