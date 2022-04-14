<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanModel extends Model
{
    use HasFactory;


    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $fillable = [
        'nopol',
        'jenis_kendaraan',
        'tahun_kendaraan',
        'warna_kendaraan',
        'no_rangka',
        'no_mesin',
        'tonase',
        'atas_nama',
        'pemakai_kendaraan_id',
        'polis_asuransi',
        'tgl_ex_asuransi',
        'asuransi_id',
        'tgl_ex_stnk',
        'tgl_ex_pajak_stnk',
        'tgl_ex_kir',
        'keterangan'
    ];
}
