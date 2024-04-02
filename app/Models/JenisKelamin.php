<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [
        'id_jenis_kelamin',
    ];

    protected $fillable =[
        'id_jenis_kelamin',
        'nama'
    ];
}
