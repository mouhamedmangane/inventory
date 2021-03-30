<?php

namespace App\View\Components\Role\Util;

use Illuminate\View\Component;
use App\Models\Objet;
class DroitObjetGroup extends Component
{
    public $role;
    public $objets;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($role=null)
    {
        $this->role=$role;
        $this->objets= Objet::all();
    }

    public function getRoleObjectByObjet($objet){
      
        return  collect($this->role->role_objects)->first(function($value,$key){
            return $value->objet_id == $objet->id;
        });
           
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.role.util.droit-objet-group');
    }
}
