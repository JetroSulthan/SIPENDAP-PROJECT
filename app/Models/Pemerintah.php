<?php

namespace App\Models;

use App\Models\User;
use App\Models\Petani;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
