<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitDefault extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_name','role');
    }


    public function object()
    {
        return $this->belongsTo('App\Models\Object', 'object_name', 'object_name');
    }
}
