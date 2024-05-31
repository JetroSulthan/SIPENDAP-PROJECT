<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_KelompokTani extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'kelompok_tanis';

    protected $guarded = [
        'id_kelompok_tani',
    ];

    protected $fillable =[
        'users_id',
        'nama_kelompok',
        'nik',
        'nama_lengkap',
        'jenis_kelamins_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jalan',
        'kecamatan',
        'kota'
    ];

    public function Petani()
    {
        return $this->hasMany(M_Petani::class);
    }

    public function JenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
