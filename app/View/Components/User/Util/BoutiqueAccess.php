<?php


namespace App\View\Components\User\Util;


use Illuminate\View\Component;
use App\Models\Role;
use App\Models\Boutique;


class BoutiqueAccess extends Component
{

    public $user,$roles,$boutiques;

    private $boutiqueAccees
            ,$editable;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user=null,$Editable=false)
    {
        $this->user=$user;
        $this->editable=$editable;
        //
        $this->roles=Roles::get()->pluck('role_nom','id');
        $this->boutiques=Boutiques::get()->pluck('nom','id');
        
        if($user){
            $this->boutiqueAccess= $user->boutiqueAccess;
            
        }
    }

    public function isCanWorkInBoutique($boutique){

    }

    public function getAccessBoutique($boutique){
        return collect($this->boutiqueAcess)->first(function($value,$key){
            return $value->boutique_id == $boutique_id;
        });
    }

    // ce
    public function getIdRoleForSelect($boutiqueAccess){
        return ($boutiqueAccess) ? $boutiqueAccees->role_id : -1;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if($this->editable)
            return view('components.param-compte.util.boutique-access');
        else
            return view('components.param-compte.util.boutique-access-editable');

    }
}
