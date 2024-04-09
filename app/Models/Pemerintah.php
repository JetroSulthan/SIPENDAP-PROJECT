<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemerintah extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_pemerintah',
    ];

    protected $fillable =[
        'users_id',
        'nip',
        'nama_lengkap',
        'nomor_sk'  
    ];

    public function Petani()
    {
        return $this->hasMany(Petani::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
