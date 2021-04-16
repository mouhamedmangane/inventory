<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function depenses()
    {
        return $this->hasMany('App\Models\Depense');
    }


    public function ventes()
    {
        return $this->hasMany('App\Models\Vente');
    }
    public function achats()
    {
        return $this->hasMany('App\Models\Achat');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_users_table', 'user_id', 'role');
    }
    public function droit_specifiques()
    {
        return $this->hasMany('App\Models\DroitSpecifique');
    }

    public function boutique_users()
    {
         return $this->hasMany('App\Models\BoutiqueUser');
   }
    public function evenements()
    {
        return $this->hasMany('App\Models\Evenement');
    }
    public function produits()
    {
        return $this->hasMany('App\Models\Produit');
    }




}
