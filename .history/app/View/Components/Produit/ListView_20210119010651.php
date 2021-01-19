<?php

namespace App\View\Components\Produit;

use App\View\Components\ComponentWithId;
use App\View\Components\Generic\Action;
use App\ViewModel\Navs\NavModelFactory;
use App\ViewModel\BarreActions\Barre;

class ListView extends  ComponentWithId
{


    public $selectTitreItems;
    public $actionItems;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->selectTitreItems = $this->initSelectTitreItems();
        $this->actionItems = $this->initActionItems(); 
         
    }

    public function columns(){
        return [
            (object)  ['name'=>'Libelle','propertyName'=>'libelle'], 
            (object)  ['name'=>'Categorie','propertyName'=>'categorie'],
            (object)  ['name'=>'Quantité Stock ','propertyName'=>'qteStock'],
            (object)  ['name'=>'Code Produit','propertyName'=>'qteSeuil'],
            (object)  ['name'=>'Prix Vente','propertyName'=>'pruxVenteMin'],
            (object)  ['name'=>'Prix Achat','propertyName'=>'prixAchatMax'],
            (object)  ['name'=>'Status','propertyName'=>'status'],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'prixAchatMax'],
        ];
    }

    public function initSelectTitreItems(){
        return 
        [
            ["name"=>"Tous","icon"=>"add","filter"=>'tous'],
            ["name"=>"Actif","icon"=>"add","filter"=>'tous'],
            ["name"=>"Desactive","icon"=>"add","filter"=>'tous']
        ];
    }

    public function initActionItems(){
        return (object) 
        [
            (object)  ["tag"=>"a", "id"=>"i", "link"=>url('\dashbord'), "name"=>"Add", "icon"=>"add", "priority"=>0, "class" =>"btn btn-success"],
            (object)  ["tag"=>"button", "id"=>"i", "name"=>"Remove", "icon"=>"add", "priority"=>1,"class" =>"btn"],
            (object)  ["tag"=>"button", "id"=>"i", "name"=>"Archiver", "icon"=>"add", "priority"=>1,"class" =>"btn"]
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
