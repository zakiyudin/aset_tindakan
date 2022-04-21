<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan\AsuransiModel;
use App\Models\Kendaraan\PemakaiKendaraanModel;

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

    public function asuransi()
    {
        return $this->belongsTo(AsuransiModel::class, 'asuransi_id');
    }

    public function pemakai_kendaraan()
    {
        return $this->belongsTo(PemakaiKendaraanModel::class, 'pemakai_kendaraan_id');
    }

}
