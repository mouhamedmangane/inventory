<?php

namespace App\View\Components\Generic\Navs;

use Illuminate\View\Component;

use App\ViewModel\Navs\NavModel;
use App\ViewModel\Navs\NavtestClasse;

class Nav extends Component
{


    public $navModel;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $navModel)
    {
        $this->navModel = $navModel;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.navs.nav');
    }
}
