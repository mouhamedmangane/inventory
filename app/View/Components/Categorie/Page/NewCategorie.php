<?php

namespace App\View\Components\Categorie\Page;

use Illuminate\View\Component;

class NewCategorie extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.categorie.page.new-categorie');
    }
}
