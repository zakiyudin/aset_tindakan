<?php

namespace App\Http\Controllers\Kendaraan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan\KendaraanModel;
use Carbon\Carbon;
use DB;

class ExpiredController extends Controller
{
    public $date_now ;


    public function __construct()
    {
        $this->middleware('auth');
        $this->date_now = Carbon::parse(Carbon::now());
    }

    public function asuransi_expired()
    {
        $asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        // dd($asuransi);
        return view('kendaraan.kendaraan_expired.asuransi', compact('asuransi'));
    }

    public function pajak_stnk_expired()
    {
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        // dd($pajak_stnk);
        return view('kendaraan.kendaraan_expired.pajak_stnk', compact('pajak_stnk'));
    }

    public function stnk_expired()
    {
        $stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        return view('kendaraan.kendaraan_expired.stnk', compact('stnk'));
    }

    public function kir_expired()
    {
        $kir = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        return view('kendaraan.kendaraan_expired.kir', compact('kir'));
    }

    public function update_asuransi_otomatis()
    {
        $date_now = Carbon::parse(Carbon::now());
        $asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        

        foreach($asuransi as $item){
            $date_expired = Carbon::parse($item->tgl_ex_asuransi);
            $date_diff_days = $date_expired->diffInDays($date_now);
            if($date_diff_days < 7 && $date_expired < $date_now && $item->tgl_ex_asuransi != null){
                $item->update([
                    'tgl_ex_asuransi' => '1970-01-01'
                ]);
            }
        }

        return back();
    }

    public function update_pajak_stnk_otomatis()
    {
        //
        $date_now = Carbon::parse(Carbon::now());
        $pajak_stnk_1_thn = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        
        foreach($pajak_stnk_1_thn as $item){
            $date_expired = Carbon::parse($item->tgl_ex_pajak_stnk);
            $date_diff_days = $date_expired->diffInDays($date_now);
            if($date_diff_days < 7 && $date_expired < $date_now && $item->tgl_ex_pajak_stnk != null){
                $item->update([
                    'tgl_ex_pajak_stnk' => '1970-01-01'
                ]);
            }
        }

        return back();
    }

    public function update_stnk_otomatis()
    {
        $date_now = Carbon::parse(Carbon::now());
        $pajak_stnk_5_thn = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();


        foreach($pajak_stnk_5_thn as $item){
            $date_expired = Carbon::parse($item->tgl_ex_stnk);
            $date_diff_days = $date_expired->diffInDays($date_now);
            if($date_diff_days < 7 && $date_expired < $date_now && $item->tgl_ex_stnk != null){
                $item->update([
                    'tgl_ex_stnk' => $date_expired->addYear(5)->format('Y-m-d')
                ]);
            }
        }
    }

    public function update_kir_otomatis()
    {
        $date_now = Carbon::parse(Carbon::now());
        $kir = KendaraanController::with('asuransi', 'pemakai_kendaraan')->get();

        foreach($kir as $item){
            $date_expired = Carbon::parse($item->tgl_ex_kir);
            $date_diff_days = $date_expired->diffInDays($date_now);
            if($date_diff_days < 7 && $date_expired > $date_now && $item->tgl_ex_kir != null){
                $item->update([
                    'tgl_ex_kir' => $date_expired->addMounth(6)>format('Y-m-d')
                ]);
            }
        }
    }
}
