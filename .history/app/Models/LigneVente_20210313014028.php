<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneVente extends Model
{
    use HasFactory;
    
    public function produit()
    {
        return $this->belongsTo('App\Models\Vente');
    }
    public function vente()
    {
        return $this->belongsTo('App\Models\Vente');
    }
    public function ligne_vente_recus()
    {
        return $this->hasMany('App\Models\LigneVenteRecu');
    }

}
