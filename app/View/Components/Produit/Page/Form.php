<?php

namespace App\View\Components\Produit\Page;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new comp    onent instance.
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
        return view('components.produit.page.form');
    }
}
