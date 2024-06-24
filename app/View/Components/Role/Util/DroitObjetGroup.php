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
       $id=$objet->id;
       return collect($this->role->role_objets)->first(function($value,$key) use($id){
            return $value->objet_id == $id;
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
