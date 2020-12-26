<?php

namespace App\View\Components\Generic\Navs;

use Illuminate\View\Component;
use App\ViewModel\Navs\NavtestClasse;

class NavBloc extends Component
{
    use NavTestClasse;

    public $name;
    public $navElementModels;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($navElementModels,$name ="")
    {   
        $this->name = $name;
        $this->navElementModels = $navElementModels;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.navs.nav-bloc');
    }
}