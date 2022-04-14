<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunKendaraanModel extends Model
{
    use HasFactory;

    protected $table        = 'tahun_kendaraan';
    protected $primaryKey   = 'id_tahun_kendaraan';
    protected $fillable     = ['tahun_kendaraan'];
}
