<?php

namespace App\View\Components\User\Page;
use App\Models\BoutiqueUser;


use Illuminate\View\Component;

class create extends Component
{
    public $user;
    public $statusUser,$couleurUser,$nbrBoutiques;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
        $this->statusUser="Brouillon";
        $this->couleurUser="";
        $this->nbrBoutique=0;
        if($user->id && $user->id>0){
            if($user->archiver!=0){
                $this->statusUser="Archivé";
                $this->couleurUser="danger";
            }
            else{
                $this->statusUser="En Activité";
                $this->couleurUser="success";
            }
            $this->nbrBoutiques=BoutiqueUser::where('user_id',$user->id)->where('activer',1)->count();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.page.create');
    }
}
