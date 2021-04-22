<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composant extends Model
{
    use HasFactory;

    public function produit()
    {
        return $this->belongsTo('App\Models\Produit', 'produit_id', 'id');
    }
    public function paquet()
    {
        return $this->belongsTo('App\Models\Produit', 'paquet_id', 'id');
    }

}
