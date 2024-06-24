<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
    
    public function boutiques()
    {
        return $this->hasMany('App\Models\Boutique');
    }
    public function proprietaire()
    {
        return $this->belongsTo('App\Models\User');
    }
}
