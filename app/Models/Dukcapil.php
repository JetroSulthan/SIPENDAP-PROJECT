<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dukcapil extends Model
{
    use HasFactory;

    public function Petani()
    {
        return $this->hasOne(Petani::class);
    }
}
