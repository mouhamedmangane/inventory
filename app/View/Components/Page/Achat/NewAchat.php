<?php

namespace App\View\Components\Page\Achat;

use Illuminate\View\Component;

class NewAchat extends Component
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
        return view('components.page.achat.new-achat');
    }
}
