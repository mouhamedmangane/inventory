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
            (object)  ['name'=>'Produit','propertyName'=>'produit','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Categorie ','propertyName'=>'categorie','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'S. Avant | Apres','propertyName'=>'stock',"classStyle"=>"dt-col-1 text-align-center"],
            (object)  ['name'=>'P.ajusté','propertyName'=>'ajuste',"classStyle"=>"dt-col-1 text-align-center"],
            (object)  ['name'=>'Date','propertyName'=>'date',"classStyle"=>"dt-col-3"],
            (object)  ['name'=>'Prix','propertyName'=>'prix','visible'=>false,"classStyle"=>""],
            (object)  ['name'=>'Notes','propertyName'=>'notes','visible'=>false,"classStyle"=>""],
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
