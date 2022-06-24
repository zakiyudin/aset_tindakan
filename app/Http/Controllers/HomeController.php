<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAsetModel;
use App\Models\DivisiModel;
use App\Models\TindakanAsetModel;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MyFirstNotification;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Kendaraan\KendaraanModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::now();
        
        $jumlah_kendaraan = KendaraanModel::count();
        $asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                        ->where('tgl_ex_asuransi', '<=' ,$today)
                        ->count();
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                        ->where('tgl_ex_pajak_stnk', '<=' ,$today)
                        ->count();
        $stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                        ->where('tgl_ex_stnk', '<=' ,$today)
                        ->count();
        $kir = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                        ->where('tgl_ex_kir', '<=' ,$today)
                        ->count();
        // dd($asuransi);
        $kendaraan = KendaraanModel::count();
        

        return view('home', \compact('jumlah_kendaraan', 'asuransi', 'stnk', 'pajak_stnk', 'kir', 'kendaraan'));
    }

    public function decrypt_pass()
    {
        $aset = TindakanAsetModel::all();
        $divisi = $aset->divisi;
        dd($divisi);
    }

    public function send()
    {
        
        // $dateSubtract = Carbon::now()->subDays(7);
        // dd($dateSubtract);
        $dateNow = Carbon::parse(Carbon::now());
        // dd($dateNow->addDays(7));
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        foreach ($pajak_stnk as $date_expired_pajak_stnk) {
            # code...
            $date_expired = Carbon::parse($date_expired_pajak_stnk->tgl_ex_pajak_stnk);
            $date_diff_days = $date_expired->diffInDays($dateNow);
            if($date_diff_days < 25 && $date_expired >= $dateNow && $date_expired_pajak_stnk->tgl_ex_pajak_stnk != null){
                // jika diff in days kosong
                echo $date_expired_pajak_stnk->nopol. ' - ' . $date_expired_pajak_stnk->jenis_kendaraan . ' kendaraan ini akan expired Pajak STNK-nya dalam jangka ' . $date_diff_days . ' Hari' . ' dengan tanggal ' . $date_expired_pajak_stnk->tgl_ex_pajak_stnk . '<br>';
            }else if($date_expired <= $dateNow){
                echo $date_expired_pajak_stnk->nopol . ' - ' . $date_expired_pajak_stnk->tgl_ex_pajak_stnk . ' kendaraan ini sudah expired dalam ' . $date_diff_days . ' Hari yang lalu' . ' dengan tanggal ' . $date_expired_pajak_stnk->tgl_ex_pajak_stnk . '<br>';
            }
        }

        // $dataArray = [
        //     '2022-06-07',
        //     '2022-06-08',
        //     '2022-06-09',
        //     '2022-06-10',
        //     '2022-06-11',
        //     '2022-06-12',
        //     '2022-06-13',
        //     '2022-06-14',
        //     '2022-06-15',
        //     '2022-06-16',
        //     '2022-06-17',
        //     '2022-06-18',
        //     '2022-06-21',
        //     '2022-06-20',
        //     '2022-06-19',
        //     '2022-06-18',
        //     '2022-06-25',
        //     '2022-06-24',
        //     '2022-06-30',
        //     '2022-06-29'
        // ];
        // foreach($dataArray as $date){
        //     $dateParse = Carbon::parse($date);
        //     if($dateParse->diffInDays($dateNow) < 7 && $date > $dateNow)
        //     {
        //         echo $date . ' tanggal ini akan expired dalam ' . $dateParse->diffIndays($dateNow) . '<br>';
        //     }else if($date < $dateNow){
        //         echo $date . ' tanggal ini sudah expired<br>';
        //     }
        // }

    }


    public function cobaup(Request $request)
    {
        dd($request->file('img'));
    }

}
