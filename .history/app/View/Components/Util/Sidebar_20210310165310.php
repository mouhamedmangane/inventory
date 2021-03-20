<?php

namespace App\View\Components\Util;

use Illuminate\View\Component;
use App\ViewModel\Navs\NavModelFactory;

class Sidebar extends Component
{

    public $navModel;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->navModel = $this->initNavModel();   
    }

    public function initNavModel(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord","/ ","home")
            ->addNavItemModel("Contact","/dashbord","account_box ")
            ->addNavGroupModel(NavModelFactory::navGroupModel("Produit Groupe","home")
                ->addNavItemModel("Produits","/produit/list",true)
                ->addNavItemModel("Ajustement","/dashbord",)
                ->addNavItemModel("Rebut","/dashbord")
            )

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente","/vente","shopping_cart")
            ->addNavItemModel("Achat","/dashbord","receipt")
            ->addNavItemModel("Depense","/dashbord","remove_shopping_cart")
            
        ) 
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Integration","/Integration","integration_instructions")
            ->addNavItemModel("Rapport","/dashbord","flag")
        ) 
        ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.util.sidebar');
    }
}
