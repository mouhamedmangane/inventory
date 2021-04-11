<?php

namespace App\View\Components\Page\Produit;

use Illuminate\View\Component;

class Modifier extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $produit;
    public function __construct($produit)
    {
        //
         $this->produit=$produit;
    }    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page.produit.modifier');
    }
}
