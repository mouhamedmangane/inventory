<?php

namespace App\View\Components\Page\Vente;

use Illuminate\View\Component;
use DataTables;

class VoirVente extends Component
{
    public $vente;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vente)
    {
        $this->vente=$vente;
        //
    }
 
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    
    public function render()
    {
        return view('components.page.vente.voir-vente');
    }
}
