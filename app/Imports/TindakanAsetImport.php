<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\TindakanAsetModel;
use Carbon\Carbon;

class TindakanAsetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            # code...
            TindakanAsetModel::create([
                'nama_aset'         => $row[0],
                'tanggal_pembelian' => Carbon::parse($row[1]),
                'tanggal_expired'   => Carbon::parse($row[2]),
                'id_tipe_asset'     => $row[3],
                'id_divisi'         => $row[4],
                'spesifikasi'       => $row[5],
            ]);
        }
    }
}
