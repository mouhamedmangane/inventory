<?php

namespace App\View\Components\Page\Vente;

use Illuminate\View\Component;
use DataTables;

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
    public function titre(){
        return [
            (object)  ['name'=>'Image','propertyName'=>'image'],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie','visible'=>false],
            (object)  ['name'=>'Produit','propertyName'=>'produit_name'],
            (object)  ['name'=>'Qte Demandée','propertyName'=>'quantiteD'], 
            (object)  ['name'=>'Qte Reçue','propertyName'=>'quantiteR'],
            (object)  ['name'=>'Prix Unitaire','propertyName'=>'prix'],
            (object)  ['name'=>'Montant Total','propertyName'=>'mtotal'],
            (object)  ['name'=>'Réduction ','propertyName'=>'reduction','visible'=>false],
        ];
    }
    public function ventes(){
        $ligneVentes=$this->vente->ligne_ventes();
        $json = DataTables::of($ligneVentes)
        ->addColumn('image',function($ligneVentes){                
                $srcImag='images/produits/'.$ligneVentes->produit->img;
                 if(!is_file($srcImag))    
                    $srcImag='images/produits/0.png';//image par défaut

                return "<img src=".asset($srcImag)."
                        width='30px'
                        height='30px'
                        class='rounded-circle' 
                        >";
            })        
        ->addColumn('categorie',function($ligneVentes){      
            return $ligneVentes->produit->groupe_produit->groupe_name;
            })  
        ->addColumn('produit',function($ligneVentes){      
            return $ligneVentes->produit->libelle;
            })
        ->addColumn('quantiteD',function($ligneVentes){      
            return $ligneVentes->quantiteDemande;
        })
        ->addColumn('quantiteD',function($ligneVentes){      
            return $ligneVentes->quantiteDemande;
        })
        ;
    }
    public function render()
    {
        return view('components.page.vente.voir-vente');
    }
}
