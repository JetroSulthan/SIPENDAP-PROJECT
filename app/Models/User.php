<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin;
use App\Models\KelompokTani;
use App\Models\Pemerintah;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    // public $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =[
        'id'
    ];
    
    protected $fillable =[
        'username',
        'password',
        'roles_id'
    ];

    protected $casts = ['password' => 'hashed'];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function Pemerintah()
    {
        return $this->hasMany(M_Pemerintah::class);
    }

    public function kelompokTani()
    {
        return $this->hasMany(M_KelompokTani::class);
    }

    public function Admin()
    {
        return $this->hasMany(M_Admin::class);
    }

}
