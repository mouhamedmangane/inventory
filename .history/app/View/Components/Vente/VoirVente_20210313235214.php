<?php

namespace App\View\Components\Vente;

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

    public function titre(){
        return [
            (object)  ['name'=>'Image','propertyName'=>'image'],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie','visible'=>false],
            (object)  ['name'=>'Produit','propertyName'=>'produit'],
            (object)  ['name'=>'Qté Reçue / Demandée  ','propertyName'=>'recu_demande'], 
            (object)  ['name'=>'Prix Unitaire','propertyName'=>'prixUnite'],
            (object)  ['name'=>'Montant Total','propertyName'=>'mtotal'],
            (object)  ['name'=>'Réduction ','propertyName'=>'reduction','visible'=>false],
        ];
    }
    public function ventes(){
        $ligneVentes=$this->vente->ligne_ventes();
        $dataTable = DataTables::of($ligneVentes)
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
        ->addColumn('recu_demande',function($ligneVentes){      
                return "<div class='d-flex justify-content-center'>
                            <span class='badge badge-success font-weight-bold w-50'>".$ligneVentes->quantiteRecu."</span>  
                            <label  font-weight-bold >/</label>
                            <span class='badge badge-primary w-50'>".$ligneVentes->quantiteDemande."</span>
                        </div>" ;
                }) 
        ->addColumn('produit',function($ligneVentes){      
            return $ligneVentes->produit->libelle;
            })
        ->addColumn('mtotal',function($ligneVentes){      
            return $ligneVentes->prixUnite*$ligneVentes->quantiteDemande;;
        })
        ->addColumn('reduction',function($ligneVentes){ 
            if($ligneVentes->reduction_note)     
                return $ligneVentes->reduction_note;
            else 
                return "Pas de reduction";
        })->rawColumns(['image','categorie','produit','recu_demande',"prixUnite",'mtotal','reduction'])
        ->make(true);
        $response=$dataTable->getData(true);

        
        return $response['data'];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.vente.voir-vente');
    }
}
