<?php

namespace App\Exports;

use App\Models\Kendaraan\KendaraanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;

class KendaraanExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')->get();
        foreach ($data as $key) {
            # code...
            // if nama_pemakai_kendaraan == null
            if($key->pemakai_kendaraan_id == null){
                $key->nama_pemakai_kendaraan->update([
                    'nama_pemakai_kendaraan' => '-',
                ]);
            }
        }
        return view('kendaraan.export_excel', \compact('data'));
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
    
    // public function collection()
    // {
    //     return DB::table('kendaraan')
    //                 ->join('pemakai_kendaraan', 'kendaraan.pemakai_kendaraan_id', '=', 'pemakai_kendaraan.id_pemakai_kendaraan')
    //                 ->join('asuransi', 'kendaraan.asuransi_id', '=', 'asuransi.id_asuransi')
    //                 ->select('kendaraan.*', 'pemakai_kendaraan.nama_pemakai_kendaraan', 'asuransi.nama_asuransi')
    //                 ->get();
    // }
}
