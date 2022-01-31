<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanModel extends Model
{
    use HasFactory;

    protected $table = 'tindakan';
    protected $primaryKey = 'id_tindakan';
    protected $fillable = ['nama_tindakan', 'keterangan', 'tanggal_tindakan', 'id'];
}
