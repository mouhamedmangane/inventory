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
    

}
