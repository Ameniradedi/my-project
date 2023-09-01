<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit_agricole extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prix",
        "déscription",
        "num tel"
        ];
}
