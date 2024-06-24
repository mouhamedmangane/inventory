<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    public function ligne_achat_recus()
    {
        return $this->hasMany('App\Models\LigneAchatRecu');
    }
    public function ligne_achat_demandes()
    {
        return $this->hasMany('App\Models\LigneAchatDemande');
    }
    public function fournisseur()
    {
        return $this->belongsTo('App\Models\Fournisseur');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function ligne_payement_achats()
    {
        return $this->hasMany('App\Models\LignePayementAchats');
    }

   




}
