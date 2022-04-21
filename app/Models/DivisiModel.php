<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kendaraan\PemakaiKendaraanModel;

class DivisiModel extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';
    protected $fillable = ['nama_divisi'];


    public function aset()
    {
        return $this->hasMany(TindakanAsetModel::class);
    }

    public function pemakai()
    {
        return $this->hasMany(PemakaiKendaraanModel::class);
    }
    
}
