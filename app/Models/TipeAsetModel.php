<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAsetModel extends Model
{
    use HasFactory;

    protected $table = 'tipe_asset';
    protected $primaryKey = 'id_tipe_asset';
    protected $fillable = ['nama_tipe_asset'];
}
