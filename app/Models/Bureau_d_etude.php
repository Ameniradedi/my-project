<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau_d_etude extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "adresse",
    ];

    public function rendez_vouses()
    {
        return $this->hasMany(Rendez_vous::class);
    }
}
