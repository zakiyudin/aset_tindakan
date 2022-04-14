<?php

namespace App\Imports;

use App\Models\Kendaraan\KendaraanModel;
use Maatwebsite\Excel\Concerns\ToModel;

class KendaraanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KendaraanModel([
            'nopol' => $row[0],
            'jenis_kendaraan' => $row[1],
            'tahun_kendaraan' => $row[2],
            'warna_kendaraan' => $row[3],
            'no_rangka' => $row[4],
            'no_mesin' => $row[5],
            'tonase' => $row[6],
            'atas_nama' => $row[7],
            'pemakai_kendaraan_id' => $row[8],
            'polis_asuransi' => $row[9],
            'tgl_ex_asuransi' => $row[10],
            'asuransi_id' => $row[11],
            'tgl_ex_stnk' => $row[12],
            'tgl_ex_pajak_stnk' => $row[13],
            'tgl_ex_kir' => $row[14],
            'keterangan' => $row[15],
        ]);
    }
}
