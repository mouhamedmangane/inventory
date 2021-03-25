<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rebut extends Model
{
    use HasFactory;
    public function produit()
    {
        return $this->belongsTo('App\Models\Produit');
    }
}
