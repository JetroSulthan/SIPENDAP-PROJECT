<?php

namespace App\Models;

use App\Models\Petani;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_persetujuan',
    ];

    protected $fillable =[
        'opsi'
    ];
    
    public function Petani()
    {
        return $this->hasMany(Petani::class);
    }

    public function Kios()
    {
        return $this->hasMany(Kios::class);
    }
}
