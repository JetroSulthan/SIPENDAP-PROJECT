<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokTani extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_kelompok_tani',
    ];

    protected $fillable =[
        'id_kelompok_tani',
        'nama_lengkap',
        'nik',
        'tempat_lahir',
        'alamat'
    ];
}
