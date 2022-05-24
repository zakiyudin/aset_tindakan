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
        $tipe_aset = TipeAsetModel::count();
        $divisi = DivisiModel::count();
        $aset = TindakanAsetModel::count();
        $expired_aset = DB::table('table_tindakan_aset')
        ->join('tipe_asset', 'table_tindakan_aset.id_tipe_asset', '=', 'tipe_asset.id_tipe_asset')
        ->join('divisi', 'table_tindakan_aset.id_divisi', '=', 'divisi.id_divisi')
        ->select([
            'table_tindakan_aset.id',
            'table_tindakan_aset.nama_aset',
            'table_tindakan_aset.tanggal_pembelian',
            'tipe_asset.nama_tipe_asset as nama_tipe_asset', 
            'divisi.nama_divisi as nama_divisi'
            ])
        ->where('tanggal_expired', '<=' ,Carbon::now())
        ->count();
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
        

        return view('home', \compact('asuransi', 'stnk', 'pajak_stnk', 'kir', 'kendaraan'));
    }

    public function decrypt_pass()
    {
        $aset = TindakanAsetModel::all();
        $divisi = $aset->divisi;
        dd($divisi);
    }

    public function send()
    {
        $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
                                ->where('pemakai_kendaraan_id', '=', '0')
                                ->get();

        dd($data);


        // dd($data);


        // $date_now = Carbon::now();

        // echo '<br>';
        // $tgl_exp_asuransi = KendaraanModel::pluck('tgl_ex_asuransi');
        // $tgl_exp_stnk = KendaraanModel::pluck('tgl_ex_stnk');
        // $tgl_exp_pajak_stnk = KendaraanModel::pluck('tgl_ex_pajak_stnk');
        // $tgl_exp_kir = KendaraanModel::pluck('tgl_ex_kir');

        // $data = KendaraanModel::with('asuransi', 'pemakai_kendaraan')
        //                 ->where('tgl_ex_asuransi', '<=' ,$date_now)
        //                 ->orWhere('tgl_ex_stnk', '<=' ,$date_now)
        //                 ->orWhere('tgl_ex_pajak_stnk', '<=' ,$date_now)
        //                 ->orWhere('tgl_ex_kir', '<=' ,$date_now)
        //                 ->get();

        // foreach ($data as $item) {
        //     # code...
        //     if($item->tgl_ex_asuransi <= $date_now && $item->tgl_ex_asuransi != null){
        //         // echo 
        //         echo "Asuransi : " . $item->tgl_ex_asuransi . "<br>"; 
        //     }
        //     if($item->tgl_ex_stnk <= $date_now && $item->tgl_ex_stnk != null){
        //         echo "STNK : " . $item->tgl_ex_stnk . "<br>";
        //     }
        //     if($item->tgl_ex_pajak_stnk <= $date_now && $item->tgl_ex_pajak_stnk != null){
        //         echo "Pajak STNK : " . $item->tgl_ex_pajak_stnk . "<br>";
        //     }
        //     if($item->tgl_ex_kir <= $date_now && $item->tgl_ex_kir != null){
        //         echo "KIR : " . $item->tgl_ex_kir . "<br>";
        //     }
        //     // echo $item->nopol . "-" . $item->jenis_kendaraan . '<br>';
        // }

        // echo ".............................................. <br>";
        
        // foreach ($tgl_exp_asuransi as $date_exp_asuransi) {
        //     # code...
        //     if($date_exp_asuransi != null){
        //         $date_exp = new Carbon($date_exp_asuransi);
        //         // dd($date_exp);
        //         \date_sub($date_exp, \date_interval_create_from_date_string('7 days'));
        //         // dd($date_exp);
        //         echo $date_exp->format('Y-m-d') .  '<br>';
        //     }else{
        //         echo 'null' . '<br>';
        //     }
        // }


        // echo "------------------------------------------------- <br>";

        // foreach ($tgl_exp_asuransi as $exp_asuransi) {
            
        //     if($exp_asuransi < $date_now){
        //         //membuat unique code generator pengganti ID misalnya (DIV002)
        //         if($exp_asuransi != null){
        //             echo $exp_asuransi .   " expired asuransi " . '<br>'; 
        //         }else{
        //             echo "tgl asuransi kosong" . '<br>';
        //         }
        //     }
        // }
        // foreach ($tgl_exp_stnk as $exp_stnk) {
        //     # code...
        //     if($exp_stnk < $date_now){
        //         if($exp_stnk != null){
        //             echo $exp_stnk .   " expired stnk " . '<br>';
        //         }else{
        //             echo "tgl stnk kosong" . '<br>';
        //         }
        //         //membuat unique code generator pengganti ID misalnya (DIV002)
        //         // echo 'DIV'.str_pad(1 + 1, 3, "0", STR_PAD_LEFT) . "</br>";
        //     }
        // }
        // foreach ($tgl_exp_kir as $exp_kir) {
        //     # code...
        //     if($exp_kir < $date_now){
        //         if($exp_kir != null){
        //             echo $exp_kir . " expired kir " . '<br>'; 
        //         }else{
        //             echo "tgl kir kosong" . '<br>';
        //         }
        //         //membuat unique code generator pengganti ID misalnya (DIV002)
        //         // echo 'DIV'.str_pad(1 + 1, 3, "0", STR_PAD_LEFT) . "</br>";
        //     }
        // }
        // foreach ($tgl_exp_pajak_stnk as $exp_pajak_stnk) {
        //     # code...
        //     if($exp_pajak_stnk < $date_now){
        //         if($exp_pajak_stnk != null){
        //             echo $exp_pajak_stnk . " expired pajak stnk " . '<br>';
        //         }else{
        //             echo "tgl pajak stnk kosong" . '<br>';
        //         }
        //         //membuat unique code generator pengganti ID misalnya (DIV002)

        //         // echo 'DIV'.str_pad(1 + 1, 3, "0", STR_PAD_LEFT) . "</br>";
        //     }
        // }



        // $tgl_exp_stnk = KendaraanModel::pluck('tgl_ex_stnk');
        // $tgl_exp_asuransi = KendaraanModel::pluck('tgl_ex_asuransi');
        // $tgl_exp_kir = KendaraanModel::pluck('tgl_ex_kir');
        // $tgl_exp_pajak_stnk = KendaraanModel::pluck('tgl_ex_pajak_stnk');
        // $arrayName = array($tgl_exp_kir, $tgl_exp_stnk, $tgl_exp_asuransi, $tgl_exp_pajak_stnk);
        // // dd($arrayName[0]);
        // echo $tgl_exp_asuransi;
        // foreach ($arrayName as $value) {
        //     # code...
        //     foreach ($value as $val) {
        //         # code...
        //         if($val < $date_now){
        //             //membuat unique code generator pengganti ID misalnya (DIV002)
        //             echo $val . " expired" . '<br>'; 
        //             // echo 'DIV'.str_pad(1 + 1, 3, "0", STR_PAD_LEFT) . "</br>";
        //         }else{
        //             echo $val . " ini belum expired" . '<br>';
        //         }
        //     }
        // }




        // $tanggal_expired = TindakanAsetModel::where('tanggal_expired', '>', $date_now)->get();
        // dd($tanggal_expired);
        // foreach ($tanggal_expired as $tgl => $value) {
        //     # code...
        //     // return $value->tanggal_expired;
        //     if($value->tanggal_pembelian > $value->tanggal_expired){
        //         return 'expired';
        //     }else{
        //         return 'not expired';
        //     }
        // }



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

    public function cobaup(Request $request)
    {
        dd($request->file('img'));
    }

}
