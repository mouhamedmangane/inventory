<?php

namespace App\View\Components\vente;

use App\Models\Client;
use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;
use Illuminate\View\Component;

class Nouveau extends Component
{
    public $clients;
    /**$this->
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($clients=[])
    {
        if(!$clients)
            $this->clients=Client::all()->pluck('nom','id');
        else
        $this->clients=$clients;

    }
    public function getColumns(){
        $columns=[];
        $categories = GroupeProduit::all();

        // name refName label 
        $columns[]= GCellFactory::select("categories",'categories','categories')
                    ->setProp('groupe_name','id')
                    ->setData($categories)
                    ->defaultOption('selectionner categorie');
        //tab_categorie;
        //$composant = rebupeter_list_produitcompose;
        //if(compoant)[
            //categorie=composant.categorie;
            //list_produit=categoie.produits;
            //tab_categorie[categorie.id]=list_produit

        //]
        
        $columns[]= GCellFactory::selectFree('produits','produits','produits','categories',url('/produit/categorie'))
                    ->setProp('libelle','id')
                    ->setData([
                         
                    ])
                    ->unique(true)
                    ->defaultOption('selectionner Produit');
        $columns[]= GCellFactory::text('Qte Reçue','quantite','quantite')
                    ->type('numeric')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');
        $columns[]= GCellFactory::text('QDemandée','quantite','quantite')
                    ->type('numeric')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');
        $columns[]= GCellFactory::selectFree('unites','unites','unites','produits',url('produit/unite/'))
                    ->setProp('unite','id')
                    ->setClassTd('npl-editor-td-sm')
                    ->setData([])
                    ->defaultOption('Unité  dd');
        $columns[]= GCellFactory::text('Prix Unitaire ','prixunitaire','Prix Unitaire')
                    ->type('numeric')
                    ->setClassTd('npl-editor-td-md')
                    ->defaultValue('0');
        
        return $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.vente.nouveau');
    }
}
