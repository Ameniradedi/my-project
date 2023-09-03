<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    protected $fillable = [
        "date_et_heure",
        "user_id",
        "bureau_d_etude_id",
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function bureau_d_etude()
    {
        return $this->belongTo(Bureau_d_etude::class);
    }
}
