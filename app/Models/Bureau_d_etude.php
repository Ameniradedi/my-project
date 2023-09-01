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
        "adresse_email",
        "rendez_vous",
        "tel"
      ];
}
