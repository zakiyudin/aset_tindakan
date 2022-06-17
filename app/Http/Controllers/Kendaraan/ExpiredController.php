<?php

namespace App\Http\Controllers\Kendaraan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan\KendaraanModel;

class ExpiredController extends Controller
{
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
}
