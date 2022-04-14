<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnaKendaraanModel extends Model
{
    use HasFactory;
    protected $table        = 'warna_kendaraan';
    protected $primaryKey   = 'id_warna';
    protected $fillable     = ['nama_warna'];
}
