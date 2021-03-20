<?php

namespace App\View\Components\Produit;

use App\Models\GroupeProduit;
use Illuminate\View\Component;

class NewProduct extends Component
{
    public $categories;
    public $columns;
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
        this->columns
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
