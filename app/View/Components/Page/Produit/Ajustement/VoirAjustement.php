<?php

namespace App\View\Components\Page\Produit\Ajustement;

use Illuminate\View\Component;

class VoirAjustement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ajustement;

    public function __construct($ajus)
    {
        //
        $this->ajustement=$ajus;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page.produit.ajustement.voir-ajustement');
    }
}
