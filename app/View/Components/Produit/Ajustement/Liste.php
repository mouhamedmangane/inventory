<?php

namespace App\View\Components\Produit\Ajustement;

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
    public function columns(){
        return [
            (object)  ['name'=>'Inventaire','propertyName'=>'inventaire','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Notes ','propertyName'=>'note','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Nbre produits ajustés','propertyName'=>'nbre_prod_ajuste',"classStyle"=>"dt-col-1 text-align-center"],
            // (object)  ['name'=>'Date'=>'ajuste',"classStyle"=>"dt-col-1 text-align-center"],
            (object)  ['name'=>'Date','propertyName'=>'date',"classStyle"=>"dt-col-3"],

        ];


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.ajustement.liste');
    }
}
