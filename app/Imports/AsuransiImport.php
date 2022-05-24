<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Kendaraan\AsuransiModel;

class AsuransiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row){
            AsuransiModel::create([
                'nama_asuransi' => $row[0],
                'email_asuransi' => $row[1],
                'no_telp_asuransi' => $row[2],
                'alamat_asuransi' => $row[3],
            ]);
        }
    }
}
