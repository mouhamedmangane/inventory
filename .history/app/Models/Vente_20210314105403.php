<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ligne_ventes()
    {
        return $this->hasMany('App\Models\LigneVente');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function ligne_payement_ventes()
    {
        return $this->hasMany('App\Models\LignePayementVentes');
    }
    public function livraison_complet(){
        
    }
    public function payement_complet(){
        return $this$this->ligne_payement_ventes->sum('montant');
    }
    public function sumPayement(){
        return $this->ligne_payement_ventes->sum('montant');
    }


    
}
