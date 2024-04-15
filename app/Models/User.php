<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Pemerintah;
use App\Models\KelompokTani;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->hasMany(Pemerintah::class);
    }

    public function KelompokTani()
    {
        return $this->hasMany(KelompokTani::class);
    }

}
