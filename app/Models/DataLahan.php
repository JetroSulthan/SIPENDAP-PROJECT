<?php

namespace App\Models;

use App\Models\Petani;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLahan extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $fillable =[
        'status'
    ];

    public function Petani()
    {
        return $this->hasMany(M_Petani::class, 'data_lahans_id', 'id');
    }
}
