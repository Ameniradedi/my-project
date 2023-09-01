<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendez_vous extends Model
{
   
    use HasFactory;

    protected $fillable = [
        "client_id",
        "bureau_id",
        "date",
        "heure"
    ];

    public function client ()
    {
        return $this->belongTo(Client::class);
    }

    public function bureau_d_etude()
    {
        return $this->belongTo(Mbureau_d_etude::class);
    } 
    use HasFactory;
}
