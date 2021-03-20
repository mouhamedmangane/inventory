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
    public function titleLivraison(){
        return [
            (object) ['date'=>'Date Livraison','propertyName'=>'date'],
            (object) ['livre'=>'Quantité Livrée','propertyName'=>'qteLivre'],
            (object) ['restant'=>'Quantité Restante','propertyName'=>'qteRestant'],

        ];

    }
    public function titlePayement(){
        return [
            (object) ['name'=>'Date Paiement','propertyName'=>'date'],

            (object) ['name'=>'Montant Reçu','propertyName'=>'montant'],

        ];

    }
    public function titre(){
        $data= [
            (object)  ['name'=>'Produit','propertyName'=>'produit'],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie','visible'=>false],
            (object)  ['name'=>'Qté Reçue / Demandée  ','propertyName'=>'recu_demande'], 
            (object)  ['name'=>'Prix Unitaire','propertyName'=>'prixUnite'],
            (object)  ['name'=>'Montant Total','propertyName'=>'mtotal'],
            (object)  ['name'=>'Réduction ','propertyName'=>'reduction','visible'=>false],
        ];
        if($this->vente->complet){// pas vente complet mais livraison complet
            $data[]= (object)  ['name'=>'Quantité','propertyName'=>'quantiteRecu'];
        }
    //    dd($data);
    

        return $data;
    }
    public function ventes(){
        $ligneVentes=$this->vente->ligne_ventes();
        $dataTable = DataTables::of($ligneVentes)
        ->addColumn('produit',function($ligneVentes){                
                $srcImag='images/produits/'.$ligneVentes->produit->img;
                 if(!is_file($srcImag))    
                    $srcImag='images/produits/0.png';//image par défaut

                return "<img src=".asset($srcImag)."
                        width='30px'
                        height='30px'
                        class='rounded-circle' 
                        >
                        <span class='ml-2 '> ".$ligneVentes->produit->libelle."</span>";
            })        
        ->addColumn('categorie',function($ligneVentes){      
            return $ligneVentes->produit->groupe_produit->groupe_name;
            })  
        ->addColumn('recu_demande',function($ligneVentes){      
            
                return "<div class='d-flex justify-content-center w-100' style='font-size:22px;'>
                            <span class='border border-lignt badge badge-light p-0 pl-2'>".$ligneVentes->quantiteRecu."  
                                
                                <span class='badge badge-success '> / ".$ligneVentes->quantiteDemande."</span>
                            </span>  
                         
                        </div>" ;
                }) 
        
        ->addColumn('quantiteRecu',function($ligneVentes){      
                return "
                        <div class='d-flex justify-content-center w-100' style='font-size:20px;'>
                             <span class='badge badge-success '>".$ligneVentes->quantiteDemande."</span>
                        </div>" ;
                })
        ->addColumn('mtotal',function($ligneVentes){      
            return $ligneVentes->prixUnite*$ligneVentes->quantiteDemande;;
        })
        ->addColumn('reduction',function($ligneVentes){ 
            if($ligneVentes->reduction_note)     
                return $ligneVentes->reduction_note;
            else 
                return "Pas de reduction";
        })->rawColumns(['produit','categorie','recu_demande',"prixUnite",'mtotal','reduction','quantiteRecu'])
        ->make(true);
        $response=$dataTable->getData(true);
            
        return $response['data']; 
    }
    public function payements(){
        $lignePaiements=$this->vente->ligne_payement_ventes();
        $dataTable = DataTables::of($lignePaiements)
            ->addColumn('montant',function($lignePaiements){      
                return $lignePaiements->montant;
            })  
            ->addColumn('date',function($lignePaiements){      
                return $lignePaiements->created_at;
            })
            ->rawColumns(['date','montant'])
            ->make(true);
            $response=$dataTable->getData(true);
    
            
            return $response['data']; 
            
    } 
    public function livraisons(){
        $ligneVenteRecus=$this->vente->ligne_ventes[0]->ligne_vente_recus;
        dd($ligneVenteRecus);
        $dataTable = DataTables::of($ligneVenteRecus)
             
            ->addColumn('date',function($ligneVenteRecus){      
                return $ligneVenteRecus->created_at;
            })
            ->rawColumns(['date','qteLivre','qteRestant'])
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
