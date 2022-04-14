<?php

namespace App\Models\Kendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DivisiModel;

class PemakaiKendaraanModel extends Model
{
    use HasFactory;

    protected $table = 'pemakai_kendaraan';
    protected $primaryKey = 'id_pemakai_kendaraan';
    protected $fillable = [
        'nama_pemakai_kendaraan',
        'divisi_id'
    ];

    /**
     * Get all of the divisi for the PemakaiKendaraanModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisi(): HasMany
    {
        return $this->hasMany(Divisi::class);
    }
}
