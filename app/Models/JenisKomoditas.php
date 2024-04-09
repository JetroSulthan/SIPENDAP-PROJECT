<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKomoditas extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_jenis_komoditas',
    ];

    protected $fillable =[
        'nama_komoditas'
    ];

    public function Komodtias()
    {
        return $this->hasMany(Komodtias::class);
    }
}
