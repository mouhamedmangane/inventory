<?php
namespace App\Constante\Inventory;
use App\ViewModel\Navs\NavModelFactory;

class SidebarData{

    public static function data(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord","/ ","home")
            ->addNavItemModel("Contact","contact/","account_box ")
            ->addNavGroupModel(NavModelFactory::navGroupModel("Produit Groupe","home")
                ->addNavItemModel("Produits","produit")
                ->addNavItemModel("Ajustement","produit/ajustement",)
                ->addNavItemModel("Rejet","produit/rebut")
                ->addNavItemModel("Reduction","produit/rebut")
                ->addNavItemModel("Mouvement Stock","produit/rebut")
            )

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente","vente/","shopping_cart")
            ->addNavItemModel("Achat","achat/","receipt")
            ->addNavItemModel("Depense","/depense","remove_shopping_cart")

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Integration","integration","integration_instructions")
            ->addNavItemModel("Rapport","rapport","flag")
        )
        ;
    }
}
