<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_LaporanPemerintah extends Model
{
    use HasFactory;

    protected $table = 'laporan_pemerintahs';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable =[
        'laporan'
    ];
}
