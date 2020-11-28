<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;
use App\ViewModel\Navs\NavItemModel;

class NavItem extends Component
{   

    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$url,$icon="")
    {
        $this->model = new NavItemModel($name,$url,$icon);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.nav-item');
    }
}
