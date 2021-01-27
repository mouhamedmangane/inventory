<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;


    public function ligne_ventes()
    {
        return $this->hasMany('App\Models\LigneVente');
    }
    public function ligne_achat_recus()
    {
        return $this->hasMany('App\Models\LigneAchatRecu');
    }
    public function ligne_achat_demandes()
    {
        return $this->hasMany('App\Models\LigneAchatDemande');
    }   
    public function ajustements()
    {
        return $this->hasMany('App\Models\Ajustement');
    }

    public function rebuts()
    {
        return $this->hasMany('App\Models\Rebuts');
    }
    public function groupe_produit()
    {
        return $this->belongsTo('App\Models\GroupeProduit');
    }

    public function composants()
    {
        return $this->hasMany('App\Models\Composant', 'paquet_id', 'produit_id');
    }
    
    public function verification(){
        $errors=[];
        if($this->prixMin)
    }

}
