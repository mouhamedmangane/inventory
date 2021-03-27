<?php

namespace App\View\Components\Generic\Navs;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $model,$id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($model,$id)
    {
        $this->model=$model;
        $this->id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.navs.sidebar');
    }
}
