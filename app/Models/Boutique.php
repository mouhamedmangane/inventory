<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;


    public function entreprise()
    {
        return $this->belongsTo('App\Models\Entreprise');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\Boutique','boutique_users', 'user_id' , 'boutique_id');
    }   
   
}
