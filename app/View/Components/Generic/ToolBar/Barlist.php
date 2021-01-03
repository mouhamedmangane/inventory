<?php

namespace App\View\Components\Generic\ToolBar;

use Illuminate\View\Component;

class Barlist extends Component
{   
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.tool-bar.barlist');
    }
}