<?php

namespace App\View\Components\Role\Util;

use Illuminate\View\Component;

class DroitObjetGroup extends Component
{
    public $role;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($role=null)
    {
        $this->role=$role;
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
