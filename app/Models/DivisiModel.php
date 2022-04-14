<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiModel extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    protected $primaryKey = 'id_divisi';
    protected $fillable = ['nama_divisi'];

    /**
     * Get the pemakaiKendaraan that owns the DivisiModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pemakaiKendaraan(): BelongsTo
    {
        return $this->belongsTo(PemakaiKendaraan::class);
    }


    public function aset()
    {
        return $this->hasMany(TindakanAsetModel::class);
    }
    
}
