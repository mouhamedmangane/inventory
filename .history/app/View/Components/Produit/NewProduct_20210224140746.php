<?php

namespace App\View\Components\Produit;

use App\Models\GroupeProduit;
use Illuminate\View\Component;

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
        $columns[]= GCellFactory::select("categorie",'categorie','categorie')
                    ->setProp('text','value')
                    ->setData([
                        (object)['value'=>'ct1','text'=>'informatique'],
                        (object)['value'=>'ct2','text'=>'boutique'],
                        (object)['value'=>'ct3','text'=>'boutique'],
                    ])
                    ->defaultOption('selectionner categorie');
        $columns[]= GCellFactory::selectFree('produit','produit','produit','categorie',url('/test/categorie'))
                    ->setProp('text','value')
                    ->setData([
                        
                         
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
