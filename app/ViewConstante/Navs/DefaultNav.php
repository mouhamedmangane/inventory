<?php
namespace App\ViewConstante\Navs;

use App\ViewModel\Navs\NavModelFactory;


class DefaultNav {
    static function page(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord","/ ","home")
            ->addNavItemModel("Contact","/dashbord","account_box ")
            ->addNavGroupModel(NavModelFactory::navGroupModel("Produit Groupe","home")
                ->addNavItemModel("Ajustement","/dashbord")
                ->addNavItemModel("Rebut","/dashbord")
            )

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente","/dashbord","shopping_cart")
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
}