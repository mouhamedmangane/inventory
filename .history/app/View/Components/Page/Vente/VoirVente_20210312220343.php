<?php

namespace App\View\Components\Page\Vente;

use Illuminate\View\Component;

class VoirVente extends Component
{
    public $vente;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($vente)
    {
        $this->vente=$vente;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function columns(){
        return [
            (object)  ['name'=>'Image','propertyName'=>'image'],
            (object)  ['name'=>'Produit','propertyName'=>'produit_name'],
            (object)  ['name'=>'Qte','propertyName'=>'libelle'], 
            (object)  ['name'=>'Categorie','propertyName'=>'categorie'],
            (object)  ['name'=>'Stock|Seuil','propertyName'=>'seuilstock'],
            (object)  ['name'=>'Prix Vente','propertyName'=>'prixVente'],
            (object)  ['name'=>'Prix Achat','propertyName'=>'prixAchat','visible'=>false],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'rI','visible'=>false],
            (object)  ['name'=>'Fournisseur ','propertyName'=>'fournisseur','visible'=>false],
        ];
    }
    public function render()
    {
        return view('components.page.vente.voir-vente');
    }
}