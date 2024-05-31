<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $fillable =[
        'nama'
    ];

    public function Petani()
    {
        return $this->hasMany(M_Petani::class);
    }

    public function KelompokTani()
    {
        return $this->hasMany(M_KelompokTani::class);
    }

}
