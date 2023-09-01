<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        "nomp",
        "espace",
        "nump",
        "description",
        "prix",
        "adresse_mailp",
        "localisation"
    
    ];
}
