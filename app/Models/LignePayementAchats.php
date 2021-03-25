<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePayementAchats extends Model
{
    use HasFactory;

    public function achat()
    {
        return $this->belongsTo('App\Models\Achat');
    }
}
