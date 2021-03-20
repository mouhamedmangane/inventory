<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneVenteRecu extends Model
{
    use HasFactory;

    public function ligne_vente()
    {
        return $this->belongsTo('App\Models\LigneVente');
    }
    public function vente()
    {
        return $this->belongsTo('App\Models\Vente');
    }
}
