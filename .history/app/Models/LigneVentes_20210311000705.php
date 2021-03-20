<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneVentes extends Model
{
    use HasFactory;
    
    public function vente()
    {
        return $this->belongsTo('App\Models\Vente');
    }
    public function ligne_vente_recus()
    {
        return $this->hasMany('App\Models\Lig');
    }

}
