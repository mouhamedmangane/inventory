<?php

namespace App\View\Components\Produit;

use App\Models\GroupeProduit;
use App\View\Components\Generic\NoppalEditorTable\Table;
use Illuminate\View\Component;

class NewProduct extends Table
{
    public $categories;
    public $categories2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories=[])
    {
        if(empty($categories)){
         $this->categories = GroupeProduit::all()->pluck("groupe_name","id");
         $this->categories2 = GroupeProduit::all()->pluck("id","groupe_name");

        }
        else{
            $this->categories =$categories;
        }
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
