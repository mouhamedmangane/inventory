<?php

namespace App\View\Components\Util\HeadBarAction;

use Illuminate\View\Component;
use App\Models\User;
use Auth;

class UserContent extends Component
{
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
        if(Auth::check()){
            $this->user = Auth::user();
        }else{
            $this->user = new User();
            $this->user->name =" Test Name User";
            $this->user->login ="Test Login user";

        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.util.head-bar-action.user-content');
    }
}
