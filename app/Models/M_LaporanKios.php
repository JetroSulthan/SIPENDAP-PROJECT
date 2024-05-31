<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_LaporanKios extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'kios';

    protected $fillable =[
        'laporan'
    ];

    public function Petani()
    {
        return $this->hasMany(M_Petani::class);
    }

    public function Persetujuan()
    {
        return $this->belongsTo(M_Persetujuan::class);
    }
}
