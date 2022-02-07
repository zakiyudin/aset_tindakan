<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\TindakanAsetModel;

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
                'nama_aset' => $row[1],
                'tanggal_pembelian' => $row[2],
                'tanggal_expired' => $row[3],
                'id_tipe_asset' => $row[4],
                'id_divisi' => $row[5],
                'id_user' => $row[6],
                'spesifikasi' => $row[7],
            ]);
        }
    }
}
