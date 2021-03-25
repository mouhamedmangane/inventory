<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneAchatDemande extends Model
{
    use HasFactory;
    public function achat()
    {
        return $this->belongsTo('App\Models\Achat');
    }
    public function produit(){
        return $this->belongsTo('App\Models\Produit');
    }
    
}
