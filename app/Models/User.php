<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'id_user'
    ];
    
    protected $fillable =[
        'username',
        'password',
        'roles_id'
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function Pemerintah()
    {
        return $this->hasMany(Pemerintah::class);
    }

    public function KelompokTani()
    {
        return $this->hasMany(KelompokTani::class);
    }

}
