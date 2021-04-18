<?php

namespace App\View\Components\Produit;

use Illuminate\View\Component;
use DataTables;

class VoirProduit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $produit;
        // public function reductions(){

        //     return [
        //         (object)  ['name'=>'Nom','propertyName'=>'name','taille'=>"75px","classStyle"=>""],
        //         (object)  ['name'=>'A partir','propertyName'=>'apartir',"classStyle"=>""],
        //         (object)  ['name'=>'Pourcentage ','propertyName'=>'pourcentage','taille'=>"75px","classStyle"=>""],
        //         (object)  ['name'=>'De ','propertyName'=>'dateDebut',"classStyle"=>""],
        //         (object)  ['name'=>'à ','propertyName'=>'dateFin','visible'=>false,"classStyle"=>""],
        //         (object)  ['name'=>'Client/Groupe Client ','propertyName'=>'client',"classStyle"=>""],
        //         (object)  ['name'=>'Prix Unitaire','propertyName'=>'prix_unitaire',"classStyle"=>""],
        //     ];
        // }
    public function composants(){


        return [
            (object)  ['name'=>'Produit','propertyName'=>'produit',"classStyle"=>""],
            (object)  ['name'=>'Categorie','propertyName'=>'categorie','visible'=>true,"classStyle"=>""],
            (object)  ['name'=>'Quantite ','propertyName'=>'quantite',"classStyle"=>""],

        ];

    }
    public function getComposants(){
        $composants=$this->produit->composants;
        //dd($composants);
        $dataTable = DataTables::of($composants)

        ->addColumn('produit',function($composant){
                $srcImag='images/produits/'.$composant->produit->img;

                return "<img src=".asset($srcImag)."
                        width='50px'
                        height='50px'
                        class='rounded-circle'
                        >
                        <span class='ml-2 '> ".$composant->produit->libelle."</span>";
            })
        ->addColumn('categorie',function($composant){
            return $composant->produit->groupe_produit->groupe_name;
            })

        ->addColumn('quantite',function($composant){
                return "
                        <div class='d-flex justify-content-start w-100' style='font-size:20px;'>
                             <span class='badge badge-success '>".$composant->quantite."</span>
                        </div>" ;
                })

        ->rawColumns(['produit','categorie','quantite'])
        ->make(true);
        $response=$dataTable->getData(true);
               // dd($response);
        return $response['data'];
    }




    // public function getColumnsReductions(){
    //     $reductions=$this->produit->reductions;
    //     $dataTable = DataTables::of($reductions)
    //     ->addColumn('produit',function($reduction){
    //             $srcImag='images/produits/'.$reduction->img;

    //             return "<img src=".asset($srcImag)."
    //                     width='30px'
    //                     height='30px'
    //                     class='rounded-circle'
    //                     >
    //                     <span class='ml-2 '> ".$composant->libelle."</span>";
    //         })
    //     ->addColumn('categorie',function($composant){
    //         return $composant->groupe_produit->groupe_name;
    //         })

    //     ->addColumn('quantite',function($composant){
    //             return "
    //                     <div class='d-flex justify-content-center w-100' style='font-size:20px;'>
    //                          <span class='badge badge-success '>".$ligneVentes->quantiteDemande."</span>
    //                     </div>" ;
    //             })

    //     ->rawColumns(['produit','categorie','quantite'])
    //     ->make(true);
    //     $response=$dataTable->getData(true);

    //     return $response['data'];
    // }

    public function __construct($produit)
    {
        //
        $this->produit=$produit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.voir-produit');
    }
}
