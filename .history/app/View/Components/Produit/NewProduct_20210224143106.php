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
        // name refName label 
        $columns[]= GCellFactory::select("categorie",'categorie','categorie')
                    ->setProp('groupe_name','id')
                    ->setData($this->categories)
                    ->defaultOption('selectionner categorie');
        //tab_categorie;
        $composant = rebupeter_list_produitcompose;
        if(compoant)[
            //categorie=composant.categorie;
            //list_produit=categoie.produits;
            //tab_categorie[categorie.id]=list_produit

        //]
        $columns[]= GCellFactory::selectFree('produit','produit','produit','categorie',url('/test/categorie'))
                    ->setProp('libelle','id')
                    ->setData([
                        
                            'ct1'=>[
                                (object)['value'=>'1','text'=>'premier','prix'=>50],
                                (object)['value'=>'2','text'=>'deuxieme','prix'=>56],
                                (object)['value'=>'3','text'=>'troisime','prix'=>570],
                                (object)['value'=>'4','text'=>'quatriéme','prix'=>80]
                            ],
                           'ct2'=>[
                              (object)['value'=>'5','text'=>'cinq'],
                              (object)['value'=>'8','text'=>'huit'],
                              (object)['value'=>'6','text'=>'six'],
                              (object)['value'=>'4','text'=>'quatriéme']
                           ],
                         
                    ])
                    ->unique(true)
                    ->defaultOption('selectionner Produit');
        $columns[]= GCellFactory::text('prix','prix','prix')
                    ->type('number')
                    ->defaultValue(0);
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
