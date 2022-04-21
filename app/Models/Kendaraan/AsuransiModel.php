<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan\KendaraanModel;

class AsuransiModel extends Model
{
    use HasFactory;

    protected $table = 'asuransi';
    protected $primaryKey = 'id_asuransi';
    protected $fillable = [
        'nama_asuransi',
        'email_asuransi',
        'no_telp_asuransi',
        'alamat_asuransi',
    ];

    public function kendaraan()
    {
        return $this->hasOne(KendaraanModel::class, 'asuransi_id');
    }
}
