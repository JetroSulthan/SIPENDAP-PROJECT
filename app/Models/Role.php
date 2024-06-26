<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [
        'id',
    ];

    protected $fillable =[
        'nama_role'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}


