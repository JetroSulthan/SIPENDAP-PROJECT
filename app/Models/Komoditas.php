<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable =[
        'jenis_komoditas_id',
        'nama_komoditas'
    ];

    public function Petani()
    {
        return $this->hasMany(M_Petani::class);
    }

    public function JenisKomoditas()
    {
        return $this->belongsTo(JenisKomoditas::class);
    }
}
