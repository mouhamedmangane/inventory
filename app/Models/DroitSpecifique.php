<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitSpecifique extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
        
    }
    public function object()
    {
        return $this->belongsTo('App\Models\Object', 'object_name', 'object_name');
    }
}
