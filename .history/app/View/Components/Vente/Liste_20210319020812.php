<?php

namespace App\View\Components\Vente;

use Illuminate\View\Component;

class Liste extends Component
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
    public function getTitle(){

       return [

        (object)  ['name'=>'Vente N°','propertyName'=>'numeroVente'],
        (object)['name'=>'Client','propertyName'=>'client'],
        (object)['name'=>'Montant Total','propertyName'=>'montantTotal'],
        (object)['name'=>'Montant Restant','propertyName'=>'montantRestant'],
        (object)['name'=>'Produits','propertyName'=>'produits'],
        (object)['name'=>'Date ','propertyName'=>'date'],
        (object)['name'=>'Heure','propertyName'=>'heure'],
        (object)['name'=>'Statut','propertyName'=>'statut'],
       ];
    }

    public function render()
    {
        return view('components.vente.liste');
    }
}