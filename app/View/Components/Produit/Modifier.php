<?php

namespace App\View\Components\Produit;

use Illuminate\View\Component;
use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;



class Modifier extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $produit;
    public $categories;

    public function __construct($produit,$categories=[])
    {
        //
         $this->produit=$produit;
         if(empty($categories)){
            $this->categories = GroupeProduit ::all()->pluck("groupe_name","id");
           }
           else{
               $this->categories =$categories;
           }
           $this->columns=$this->getColumns();
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
                    ->type('number')
                    ->defaultValue('0')
                    ->setClassTd('npl-editor-td-sm');
        $columns[]= GCellFactory::text('unites','unites','unites')

                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('U');


        return $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.produit.modifier');
    }
}
