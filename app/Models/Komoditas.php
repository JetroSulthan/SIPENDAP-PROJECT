<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_komoditas',
    ];

    protected $fillable =[
        'jenis_komoditas_id',
        'nama_komoditas'
    ];
}
