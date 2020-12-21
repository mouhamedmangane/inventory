<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneVente extends Model
{
    use HasFactory;

    public function vente()
    {
        return $this->belongsTo('App\Models\Vente');
    }

    public function produit()
    {
        return $this->belongsTo('App\Models\Produit');
    }
}
