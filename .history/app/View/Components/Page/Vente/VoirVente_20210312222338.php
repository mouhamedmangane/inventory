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
        $ventes=$vente->ligne_ventes();
        $json = DataTables::of($ventes)
        ->addColumn('seuilstock',function($produit){  
                
                  
                $srcImag='images/produits/'.$produit->img;

                 if(!is_file($srcImag))    
                    $srcImag='images/produits/0.png';//image par défaut

                return "<img src=".asset($srcImag)."
                        width='40px'
                        height='40px'
                        class='rounded-circle' 
                        >";
            })             
            $classStyle = 'badge-success';
            if($produit->qteStock <=0 && $produit->qteSeuil<=0){
                return view('components.generic.bagde.simple')
                ->with('name','')
                ->with('classStyle','badge-danger')
                ->with('unite','');
            }
            else if($produit->qteStock < $produit->qteSeuil) 
                $classStyle = 'badge-danger';
            else if($produit->qteStock == $produit->qteSeuil)
                $classStyle = 'badge-warning';
            
            return view('components.generic.bagde.simple')
                        ->with('name',$produit->qteStock.'  |  '.$produit->qteSeuil)
                        ->with('classStyle',$classStyle)
                        ->with('unite',$produit->unite);    
        });
    }
    public function render()
    {
        return view('components.page.vente.voir-vente');
    }
}
