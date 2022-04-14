<?php

namespace App\Imports;

use App\Models\TindakanAsetModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class TindakanAsetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TindakanAsetModel([
            'id' => $row['id'],
            'nama_aset' => $row['nama_aset'],
            'tanggal_pembelian' => Carbon::parse($row['tanggal_pembelian'])->format('Y-m-d'),
            'tanggal_expired' => Carbon::parse($row['tanggal_expired'])->format('Y-m-d'),
            'spesifikasi' => $row['spesifikasi'],
            'id_divisi' => $row['id_divisi'],
            'id_tipe_asset' => $row['id_tipe_asset'],
        ]);
    }
}
