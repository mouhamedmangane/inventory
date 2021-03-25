<?php
namespace App\Constante\ParamCompte;
use App\ViewModel\Navs\NavModelFactory;

class SidebarData{
    
    public static function data(){
        return NavModelFactory::navModel()
        ->addNavBlocModel(
            NavModelFactory::navBlocModel()
            ->addNavItemModel("l'Entreprise","entreprise","shopping_cart")
            ->addNavItemModel("Role","role","shopping_cart")
            ->addNavItemModel("Utilisateur","user","receipt")     
            ->addNavItemModel("Securité","user","receipt")            
       
        )
        ;
    }
}