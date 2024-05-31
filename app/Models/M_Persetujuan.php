<?php

namespace App\Models;

use App\Models\Petani;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Persetujuan extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'persetujuans';

    protected $guarded = [
        'id_persetujuan',
    ];

    protected $fillable =[
        'opsi'
    ];
    
    public function Petani()
    {
        return $this->hasMany(M_Petani::class);
    }

    public function Kios()
    {
        return $this->hasMany(M_LaporanKios::class);
    }
}
