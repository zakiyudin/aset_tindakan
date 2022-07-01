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
        return view('kendaraan.kendaraan_expired.asuransi.asuransi', compact('asuransi'));
    }

    public function pajak_stnk_expired()
    {
        $pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        // dd($pajak_stnk);
        return view('kendaraan.kendaraan_expired.pajak_stnk.pajak_stnk', compact('pajak_stnk'));
    }

    public function stnk_expired()
    {
        $stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        return view('kendaraan.kendaraan_expired.stnk.stnk', compact('stnk'));
    }

    public function kir_expired()
    {
        $kir = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->get();
        return view('kendaraan.kendaraan_expired.kir.kir', compact('kir'));
    }

    public function detail_asuransi($id)
    {
        $detail_asuransi = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->where('id_kendaraan', $id)->first();

        // dd($detail_asuransi->pemakai_kendaraan);
        return view('kendaraan.kendaraan_expired.asuransi.detail_asuransi', compact('detail_asuransi'));
    }

    public function detail_pajak_stnk($id, Request $req)
    {
        // dd($reque);
        if(empty($id)){
            return view('kendaraan.kendaraan_expired.pajak_stnk.pajak_stnk');
        }else{
            $detail_pajak_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->where('id_kendaraan', $id)->first();
            return view('kendaraan.kendaraan_expired.pajak_stnk.detail_pajak_stnk', compact('detail_pajak_stnk'));
        }
    }

    public function detail_stnk($id){
        $detail_stnk = KendaraanModel::with('asuransi', 'pemakai_kendaraan')->where('id_kendaraan', $id)->first();
        return view('kendaraan.kendaraan_expired.stnk.detail_stnk', compact('detail_stnk'));
    }

    public function detail_kir($id){
        $detail_kir =KendaraanModel::with('asuransi', 'pemakai_kendaraan')->where('id_kendaraan', $id)->first();
        // dd($detail_kir);
        return view('kendaraan.kendaraan_expired.kir.detail_kir', compact('detail_kir'));
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
