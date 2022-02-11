<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanAsetModel extends Model
{
    use HasFactory;
    
    protected $table = 'table_tindakan_aset';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_aset',
        'tanggal_pembelian',
        'tanggal_tindakan',
        'nama_tindakan',
        'id_divisi',
        'id_tipe_asset',
        'spesifikasi',
        'gambar_aset',
        'tanggal_expired'
    ];

    public function divisi()
    {
        return $this->belongsTo('App\Models\DivisiModel', 'id_divisi');
    }
}
