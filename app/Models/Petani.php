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
        'nama_lengkap',
        'nik',
        'jenis_kelamins_id',
        'tempat_lahir',
        'alamat_lahan',
        'komoditas_id',
        'vol_komoditas',
        'luas_lahan',
        'titik_koor_lahan',
        'no_telp',
        'kategori_petanis_id',
        'scan_ktp',
        'scan_kk',
        'foto_lahan'
    ];
}


