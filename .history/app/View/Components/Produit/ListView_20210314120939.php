<?php

namespace App\View\Components\Produit;

use App\View\Components\ComponentWithId;
use App\View\Components\Generic\Action;
use App\ViewModel\Navs\NavModelFactory;
use App\ViewModel\Filter\FilterFactory;

class ListView extends  ComponentWithId
{


    public $selectTitreItems;
    public $actionItems;
    public $filter;

  //  public $data;

    /**
     * Create a new component instance.
     *
     * @return void
     */
   // public function __construct($data="non_archived")
    public function __construct()
    {
        //$this->data=$data;
        $this->selectTitreItems = $this->initSelectTitreItems();
        $this->actionItems = $this->initActionItems(); 
         
    }

   
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.produit.list-view');
    }
}
