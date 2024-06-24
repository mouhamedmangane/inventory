<?php

namespace App\View\Components\Produit\Ajustement;
use App\Models\GroupeProduit;
use App\ViewModel\NplEditorTableMd\GCellFactory;
use Illuminate\View\Component;
class Create extends Component
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
    public function columns(){

        return [
            (object)  ['name'=>'Categorie','propertyName'=>'name','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Code','propertyName'=>'apartir',"classStyle"=>""],
            (object)  ['name'=>'Produit ','propertyName'=>'pourcentage','taille'=>"75px","classStyle"=>""],
            (object)  ['name'=>'Stock ','propertyName'=>'dateDebut',"classStyle"=>""],
            (object)  ['name'=>'Stock Reele ','propertyName'=>'dateFin','visible'=>false,"classStyle"=>""],
            (object)  ['name'=>'Valorisation Prix','propertyName'=>'client',"classStyle"=>""],
            (object)  ['name'=>'Prix Unitaire','propertyName'=>'prix_unitaire',"classStyle"=>""],
        ];
    }
    public function getColumns(){
        $columns=[];
        $categories = GroupeProduit::all();

        $columns[]= GCellFactory::select("categories",'categories','categories')
                    ->setProp('groupe_name','id')
                    ->setData($categories)
                    ->defaultOption('selectionner categorie');
        $columns[]= GCellFactory::text('code','code','code')
                    ->type('text')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('Code Produit');

        $columns[]= GCellFactory::selectFree('produits','produits','produits','categories',url('/venteProduit/categorie'))
                    ->setProp('libelle','id')
                    ->setData([
                    ])
                    ->unique(true)
                    ->defaultOption('selectionner Produit');
        $columns[]= GCellFactory::text('stock','stock','stock')
                    ->type('number')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');

        $columns[]= GCellFactory::text('stockRelle','stockReelle','stockReelle')
                    ->type('number')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('0');
         $columns[]= GCellFactory::text('unites','unites','unites')
                    ->type('string')
                    ->setClassTd('npl-editor-td-sm')
                    ->defaultValue('Unité');
        $columns[]= GCellFactory::text('prix','prix','prix')
                    ->type('number')
                    ->setClassTd('npl-editor-td-md')
                    ->defaultValue('0');
        $columns[]= GCellFactory::text('notes','notes','notes')
                    ->type('text')
                    ->setClassTd('npl-editor-td-md  ')
                    ->defaultValue('');

        return $columns;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.produit.ajustement.create');
    }
}
