<?php

namespace App\View\Components\Produit;

use App\View\Components\ComponentWithId;
use App\View\Components\Generic\Action;
use App\ViewModel\Navs\NavModelFactory;
use App\ViewModel\Filter\FilterFactory;

class ListView extends  ComponentWithId
{

    public function columns(){
        return [
            (object)  ['name'=>'Produit','propertyName'=>'image'],
            (object)  ['name'=>'','propertyName'=>'code'],
            (object)  ['name'=>'Libelle','propertyName'=>'libelle'], 
            (object)  ['name'=>'Categorie','propertyName'=>'categorie'],
            (object)  ['name'=>'Stock|Seuil','propertyName'=>'seuilstock'],
            (object)  ['name'=>'Prix Vente','propertyName'=>'prixVente'],
            (object)  ['name'=>'Prix Achat','propertyName'=>'prixAchat','visible'=>false],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'rI','visible'=>false],
            (object)  ['name'=>'Fournisseur ','propertyName'=>'fournisseur','visible'=>false],
        ];
    }

    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.produit.list-view');
    }
}
