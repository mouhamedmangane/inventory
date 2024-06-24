<?php
namespace App\Constante\Inventory;
use App\ViewModel\Navs\NavModelFactory;

use App\Helpers\URLInventory;

class SidebarData{
    public static function prevBoutiqueUrl($url){
        $boutiqueId = request()->urlBoutiqueId;
        return 'b/'.$boutiqueId.'/'.$url;
    }
    public static function data(){

        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Dashbord",URLInventory::wB("/ "),"home")
            ->addNavItemModel("Contact",URLInventory::wB("contact"),"account_box ")
            ->addNavGroupModel(NavModelFactory::navGroupModel("Produit Groupe","home")
                ->addNavItemModel("Produits",URLInventory::wB("produit"))
                ->addNavItemModel("Ajustement",URLInventory::wB("produit/ajustement"))
                ->addNavItemModel("Rejet",URLInventory::wB("produit/rebut"))
                ->addNavItemModel("Reduction",URLInventory::wB("produit/rebut"))
                ->addNavItemModel("Mouvement Stock",URLInventory::wB("produit/rebut"))
            )

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Vente",URLInventory::wB("vente"),"shopping_cart")
            ->addNavItemModel("Achat",URLInventory::wB("achat/"),"receipt")
            ->addNavItemModel("Depense",URLInventory::wB("depense"),"remove_shopping_cart")

        )
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("Integration","integration","integration_instructions")
            ->addNavItemModel("Rapport","rapport","flag")
        )
        ->activer();

    }
}
