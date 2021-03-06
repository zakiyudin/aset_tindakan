<?php

namespace App\Imports;

use App\Models\Kendaraan\KendaraanModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Kendaraan\AsuransiModel;
use App\Models\Kendaraan\PemakaiKendaraanModel;

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
            'tgl_ex_asuransi' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10])) ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]))->format('Y-m-d') : null,
            'asuransi_id' => $row[11],
            'tgl_ex_stnk' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12])) ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]))->format('Y-m-d') : null,
            'tgl_ex_pajak_stnk' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13])) ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[13]))->format('Y-m-d') : null,
            'tgl_ex_kir' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[14])) ? Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[14]))->format('Y-m-d') : null,
            'keterangan' => $row[15],
        ]);
    }

    

}
