<?php

namespace App\View\Components\Produit;

use App\View\Components\ComponentWithId;
use App\ViewModel\Navs\NavModelFactory;

class ListView extends  ComponentWithId
{


    public $navModel;
    public $actions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->navModel = $this->initNavModel();
        $this->action =$this->initActions();   
    }
    public function initNavModel(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord","","home")
            ->addNavItemModel("Contact","","account_box ")
        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente","","shopping_cart")
            ->addNavItemModel("Achat","","receipt")
            ->addNavItemModel("Depense","","remove_shopping_cart")
        );
    }

    public function initActions(){
        return [
            ["name"=>"add","icon"=>"add","priority"=>1],
            ["name"=>"add","icon"=>"add","priority"=>1],
            ["name"=>"add","icon"=>"add","priority"=>1],
            ["name"=>"add","icon"=>"add","priority"=>1],
            ["name"=>"add","icon"=>"add","priority"=>1],
        ];
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
