<?php

namespace App\View\Components\Util\HeadBarAction;

use Illuminate\View\Component;

class NotifContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.util.head-bar-action.notif-content');
    }
}
