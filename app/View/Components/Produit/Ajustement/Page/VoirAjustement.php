<?php

namespace App\View\Components\Produit\Ajustement\Page;
use App\Models\LigneAjustement;
use Illuminate\View\Component;

class VoirAjustement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ajustement;
    public $nbre;

    public function __construct($ajus)
    {
        //
        $this->ajustement=$ajus;
      //  $this->nbre =$this->ajustement->ligne_ajustements->where('ajuste',true)->get('id')->count();
        $this->nbre =0;

    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.ajustement.page.voir-ajustement');
    }
}
