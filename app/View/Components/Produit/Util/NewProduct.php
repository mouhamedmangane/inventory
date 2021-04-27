<?php

namespace App\View\Components\Produit\Util;

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
    // public function getColumnsReductions(){
    //     $columns=[];
    //     $columns[]= GCellFactory::text("reduction_name",'reduction_name','reduction_name')
    //                 ->setClassTd('npl-editor-td-sm')
    //                 ->defaultValue('')
    //                  ;

    //     $columns[]= GCellFactory::text("apartir",'apartir','apartir')
    //                 ->type('number')
    //                 ->setClassTd('npl-editor-td-sm')
    //                 ->defaultValue('')
    //                 ;
    //     $columns[]= GCellFactory::text("pourcentage","pourcentage","pourcentage")
    //                 ->type("number")

    //                 ->setClassTd('npl-editor-td-sm')
    //                 ->defaultValue('')
    //                 ;
    //     $columns[]= GCellFactory::text("datedebut","datedebut","datedebut")
    //                 ->type('datetime-local')
    //                 ->setClassTd('npl-editor-td-md')
    //                 ->defaultValue("")
    //                 ;
    // $columns[]= GCellFactory::text("datefin",'datefin','datefin')
    //                 ->type('datetime-local')
    //                 ->setClassTd('npl-editor-td-md')
    //                 ->defaultValue('')
    //                 ;
    //     $columns[]= GCellFactory::text("Client",'Client','Client')
    //                 ->setClassTd('npl-editor-td-sm')
    //                 ->defaultValue('')
    //                 ;
    //     $columns[]= GCellFactory::text("P.Unitarie",'montant','montant')
    //                 ->setClassTd('npl-editor-td-sm')
    //                 ->defaultValue('')
    //                 ;

    //     return $columns;

    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.produit.util.new-product');
    }
}
