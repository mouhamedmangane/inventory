<?php

namespace App\View\Components\Produit;

use App\Models\GroupeProduit;
use Illuminate\View\Component;
use App\ViewModel\NplEditorTableMd\GCellFactory;

class NewProduct extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories=[])
    {
        if(empty($categories)){
         $this->categories = GroupeProduit::all()->pluck("groupe_name","id");
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
        $columns[]= GCellFactory::select("categorie",'categorie','categorie')
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
        $columns[]= GCellFactory::selectFree('produit','produit','produit','categorie',url('/produit/categorie'))
                    ->setProp('libelle','id')
                    ->setData([

                    ])
                    ->unique(true)
                    ->defaultOption('selectionner Produit');
        $columns[]= GCellFactory::text('quantite','quantite','quantite')
                    ->type('numeric')
                    ->defaultValue(0);
        $columns[]= GCellFactory::selectFree('unite','unite','unite','produit')
                    ->type('text')
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
        return view('components.produit.new-product');
    }
}
