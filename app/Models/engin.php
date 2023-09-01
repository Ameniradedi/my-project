<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engin extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "prix",
        "disponibilité",
        "description",
        "num tel",
        "carecteristique ",
       
    ];
}
