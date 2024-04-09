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
        'nama'
    ];

    public function Petani()
    {
        return $this->hasMany(Petani::class);
    }

    public function KelompokTani()
    {
        return $this->hasMany(KelompokTani::class);
    }

}
