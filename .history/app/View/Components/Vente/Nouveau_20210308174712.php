<?php

namespace App\View\Components\vente;

use App\Models\Client;
use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;
use Illuminate\View\Component;

class Nouveau extends Component
{
    public $clients;
    public $cl;
    /**$this->
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($clients=[])
    {
        if(!$clients){        
            $this->clients=Client::all()->toArray();
            $this->cl=Client::all()->pluck('nom','id');
        }else
        $this->clients=$clients;

    }
    public function getColumns(){
        $columns=[];
        $categories = GroupeProduit::all();
        
        $columns[]= GCellFactory::select("categories",'categories','categories')
                    ->setProp('groupe_name','id')
                    ->setData($categories)
                    ->defaultOption('selectionner categorie');
        
        
        $columns[]= GCellFactory::selectFree('produits','produits','produits','categories',url('/produit/categorie'))
                    ->setProp('libelle','id')
                    ->setData([
                         
                    ])
                    ->unique(true)
                    ->defaultOption('selectionner Produit');
        $columns[]= GCellFactory::text('quantiteD','quantite','quantite')
                    ->type('numeric')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');
        $columns[]= GCellFactory::text('quantiteR','quantite','quantite')
                    ->type('number')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');
         $columns[]= GCellFactory::text('unites','unites','unites')
                    ->type('string')
                    ->setClassTd('npl-editor-td-md')
                    ->defaultValue('Unité');
        $columns[]= GCellFactory::text('prix','prix','prix')
                    ->type('number')
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
