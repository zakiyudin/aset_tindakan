<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
