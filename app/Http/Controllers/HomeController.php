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
        $tipe_aset = TipeAsetModel::count();
        $divisi = DivisiModel::count();
        $tindakan_aset = TindakanAsetModel::count();

        return view('home', \compact('tipe_aset', 'divisi', 'tindakan_aset'));
    }

    public function send(){
        // $tanggal_beli = TindakanAsetModel::where('tanggal_pembelian', '=', '2022-01-01')->first();
        $date_now = Carbon::now();
        // $expired_date = $tanggal_beli->tanggal_expired;

        // $result = $date_now > $expired_date;
        // return $result;



        $tanggal_expired = TindakanAsetModel::where('tanggal_expired', '>', $date_now)->get();
        dd($tanggal_expired);
        foreach ($tanggal_expired as $tgl => $value) {
            # code...
            // return $value->tanggal_expired;
            if($value->tanggal_pembelian > $value->tanggal_expired){
                return 'expired';
            }else{
                return 'not expired';
            }
        }



        // $tanggal_beli = TindakanAsetModel::all();
        // foreach ($tanggal_beli as $tgl_beli) {
        //     $result_tanggal_beli = $tgl_beli->tanggal_pembelian;
        //     // echo $result_tanggal_beli . "<br>";
        //     $expired = Carbon::create($result_tanggal_beli);
        //     $expired_date = $expired->addDays(24);
        //     return $expired_date;
        //     // echo $expired_date . "<br>";

        //     $tindakan_aset = TindakanAsetModel::where('tanggal_pembelian', '<=', $expired_date)->get();
        //     return $tindakan_aset;
        //     // foreach($tindakan_aset as $tindakan){
        //     //     var_dump($tindakan);
        //     // }
        // }


        // $expired = Carbon::create(2022, 1, 1);
        // $tindakan_aset = TindakanAsetModel::where('tanggal_pembelian', '>', $expired)->get();
        // dd($tindakan_aset);
        // dd($tanggal_beli->tanggal_pembelian);

        
        
        
    }

}
