<?php

namespace App\View\Components\Page\Vente;

use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;
use Illuminate\View\Component;

class NewVente extends Component
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
        $columns[]= GCellFactory::text('quantite','quantite','quantite')
                    ->type('numeric')
                    ->defaultValue('0');
        $columns[]= GCellFactory::selectFree('unites','unites','unites','produits',url('produit/unite/'))
                    ->setProp('unite','id')
                    ->setData([])
                    ->defaultOption('U');     $columns[]= GCellFactory::text('quantite','quantite','quantite')
                    ->type('numeric')
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
        return view('components.page.vente.new-vente');
    }
}
