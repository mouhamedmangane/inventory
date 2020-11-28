<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

use App\ViewModel\Navs\NavModel;

class Nav extends Component
{
    public $model= [];


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(NavModel $model)
    {
        $this->model = $model;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.nav');
    }
}
