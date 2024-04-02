<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_petani',
    ];

    protected $fillable =[
        'id_petani',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'alamat_lahan',
        'vol_komoditas',
        'luas_lahan',
        'titik_koor_lahan',
        'no_telp',
        'scan_ktp',
        'scan_kk',
        'foto_lahan'
    ];
}


