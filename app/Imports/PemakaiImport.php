<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kendaraan\PemakaiKendaraanModel;

class PemakaiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            # code...
            PemakaiKendaraanModel::create([
                'nama_pemakai_kendaraan' => $row[0],
            ]);
        }
    }
}
