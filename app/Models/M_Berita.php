<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Berita extends Model
{
    use HasFactory;

    protected $guarded = ['id_berita'];
    protected $table = 'berita';
}
