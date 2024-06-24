<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneAjustement extends Model
{
    use HasFactory;


    public function ajustement()
    {
        return $this->belongsTo('App\Models\Ajustement');
    }
    public function produit(){
        return $this->belongsTo('App\Models\Produit');
    }
}

