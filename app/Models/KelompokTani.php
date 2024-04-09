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
        return $this->hasMany(Petani::class);
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
