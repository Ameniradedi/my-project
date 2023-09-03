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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bureau_d_etudes()
    {
        return $this->hasMany(Bureau_d_etude::class);
    }

    public function engins()
    {
        return $this->hasMany(Engin::class);
    }

    public function produit_agricole()
    {
        return $this->hasMany(Produit_agricole::class);
    }

    public function rendez_vouses()
    {
        return $this->hasMany(Rendez_vous::class);
    }

    public function terrain()
    {
        return $this->hasMany(Terrain::class);
    }
}
