<?php

namespace App\View\Components\Produit;

use App\View\Components\ComponentWithId;
use App\View\Components\Generic\Action;
use App\ViewModel\Navs\NavModelFactory;
use App\ViewModel\Filter\FilterFactory;

class ListView extends  ComponentWithId
{


    public $selectTitreItems;
    public $actionItems;
    public $filter;

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
            (object)  ['name'=>'Image','propertyName'=>'image'],
            (object)  ['name'=>'Code Produit','propertyName'=>'code'],
            (object)  ['name'=>'Libelle','propertyName'=>'libelle'], 
            (object)  ['name'=>'Categorie','propertyName'=>'categorie'],
            (object)  ['name'=>'Stock|Seuil','propertyName'=>'seuilstock'],
            (object)  ['name'=>'Prix Vente','propertyName'=>'prixVente'],
            (object)  ['name'=>'Prix Achat','propertyName'=>'prixAchat','visible'=>false],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'rI','visible'=>false],
            (object)  ['name'=>'Fournisseur ','propertyName'=>'fournisseur','visible'=>false],
        ];
    }

    public function getFilter(){
        return  FilterFactory::filterMd('mySearch')
                ->add(FilterFactory::ligneSelectMd('type_produit','Type Produit')
                      ->addLIgne("consommable",'Consommable')
                      ->addLigne('service','Service')
                )
                ->add(FilterFactory::ligneIntervalMd('prix','Prix','number',0,0,0))
                ->add(FilterFactory::ligneOneMd('categore','Categorie','text','egal'))
                ->add(FilterFactory::ligneIntervalMd('date_creation','Date Creation','date',0,0,0))

                ;
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
