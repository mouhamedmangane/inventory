<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function ventes()
    {
        return $this->hasMany('App\Models\Vente');
    }


    public function telephones(){
        return $this->hasMany('App\Models\Telephone');
    }
}
