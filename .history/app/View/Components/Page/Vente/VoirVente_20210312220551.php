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
            (object)  ['name'=>'Qte Demandée','propertyName'=>'quantiteD'], 
            (object)  ['name'=>'Qte Reçue','propertyName'=>'quantiteR'],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie','visible'=>false],
            (object)  ['name'=>'Prix Unitaire','propertyName'=>'prix'],
            (object)  ['name'=>'Montant Total','propertyName'=>'mtotal'],
            (object)  ['name'=>'Référence Interne ','propertyName'=>'rI','visible'=>false],
            (object)  ['name'=>'Fournisseur ','propertyName'=>'fournisseur','visible'=>false],
        ];
    }
    public function render()
    {
        return view('components.page.vente.voir-vente');
    }
}
