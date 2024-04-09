<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPetani extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id_kategori_petani',
    ];

    protected $fillable =[
        'kategori_petani'
    ];

    public function Petani()
    {
        return $this->hasMany(Petani::class);
    }
}
