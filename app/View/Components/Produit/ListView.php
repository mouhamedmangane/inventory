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
            (object)  ['name'=>'Image','propertyName'=>'image','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Code ','propertyName'=>'code','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Libelle','propertyName'=>'libelle',"classStyle"=>""],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie',"classStyle"=>""],
            (object)  ['name'=>'S. Stock','propertyName'=>'status_stock',"classStyle"=>"dt-col-1 text-align-center"],
            (object)  ['name'=>'Stock / Seuil','propertyName'=>'seuilstock',"classStyle"=>"dt-col-1 text-align-center"],
            (object)  ['name'=>'Prix Vente','propertyName'=>'prixVente',"classStyle"=>"dt-col-3"],
            (object)  ['name'=>'Prix Achat','propertyName'=>'prixAchat','visible'=>false,"classStyle"=>""],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'rI','visible'=>false,"classStyle"=>""],
            (object)  ['name'=>'Fournisseur ','propertyName'=>'fournisseur','visible'=>false,"classStyle"=>""],
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
