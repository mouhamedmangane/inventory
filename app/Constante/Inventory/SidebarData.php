<?php
namespace App\Constante\Inventory;
use App\ViewModel\Navs\NavModelFactory;

class SidebarData{
    
    public static function data(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord","/ ","home")
            ->addNavItemModel("Contact","dashbord","account_box ")
            ->addNavGroupModel(NavModelFactory::navGroupModel("Produit Groupe","home")
                ->addNavItemModel("Produits","produit")
                ->addNavItemModel("Ajustement","dashbord",)
                ->addNavItemModel("Rebut","dashbord")
            )

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente","vente/new","shopping_cart")
            ->addNavItemModel("Achat","achat/new","receipt")
            ->addNavItemModel("Depense","/depense/new","remove_shopping_cart")
            
        ) 
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Integration","Integration","integration_instructions")
            ->addNavItemModel("Rapport","dashbord","flag")
        ) 
        ;
    }
}