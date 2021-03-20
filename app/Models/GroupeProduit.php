<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeProduit extends Model
{
    use HasFactory;

    public function produits()
    {
        return $this->hasMany('App\Models\Produit');
    }
}
