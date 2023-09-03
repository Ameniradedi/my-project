<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "caracteristique",
        "adresse",
        "prix",
        "user_id",

    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
