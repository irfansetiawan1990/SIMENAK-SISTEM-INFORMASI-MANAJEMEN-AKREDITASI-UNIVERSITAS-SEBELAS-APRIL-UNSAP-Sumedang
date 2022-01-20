<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'level',
        'password',
        'image',
        'prodi_id',
        'fakul_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        public function adminlte_image()
    {
        if (auth()->user()->level=='admin'); {
            return '/images/abi.jpeg';
        }
        
        return asset('storage/'. auth::user()->image);
    }

    public function adminlte_desc()
    { 
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

     public function Approve()
    {
        return $this->belongsTo(Approve::class);
    }
}
