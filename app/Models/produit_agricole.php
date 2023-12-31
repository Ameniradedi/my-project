<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit_agricole extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "prix",
        "adresse",
        "user_id",
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
