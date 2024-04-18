<?php

namespace App\Models;

use App\Models\Petani;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berkas extends Model
{
    use HasFactory;
    // protected $table = 'berkas';

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable =[
        'status'
    ];

    public function Petani()
    {
        return $this->hasMany(Petani::class);
    }
}
