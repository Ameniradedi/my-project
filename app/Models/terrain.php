<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "espace",
        "prix",
        "adresse",
        "description",
        "user_id",
        "numero_proprietaire",
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
