<?php
namespace App\Constante\ParamCompte;
use App\ViewModel\Navs\NavModelFactory;

class SidebarData{
    
    public static function data(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("l'Entreprise","entreprise","shopping_cart")
            ->addNavItemModel("Role","param-compte/roles/create","shopping_cart")
            ->addNavItemModel("Utilisateur","param-compte/users/create","receipt")     
            ->addNavItemModel("Securité","user","receipt")            
       
        )
        ;
    }
}