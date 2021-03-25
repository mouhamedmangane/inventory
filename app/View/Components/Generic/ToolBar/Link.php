<?php

namespace App\View\Components\Generic\ToolBar;

use Illuminate\View\Component;

class Link extends Component
{
    public $id,
           $url,
           $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$url,$text)
    {
        $this->url=$url;
        $this->id=$id;
        $this->text=$text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.generic.tool-bar.link');
    }
}
