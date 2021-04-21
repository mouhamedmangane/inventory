<?php

namespace App\View\Components\Produit\Ajustement;

use Illuminate\View\Component;
use DataTables;

class VoirAjustement extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ajustement;

    public function __construct($ajus)
    {
        //
        $this->ajustement=$ajus;
    }

    public function columns(){
        return [
            (object)  ['name'=>'Produit','propertyName'=>'produit'],
            (object)  ['name'=>'Categorie ','propertyName'=>'categorie'],
            (object)  ['name'=>'code ','propertyName'=>'code'],
            (object)  ['name'=>'S. Avant -> Apres','propertyName'=>'stock',"classStyle"=>"text-align-center"],
            (object)  ['name'=>'P.ajusté','propertyName'=>'ajuste',"classStyle"=>"text-align-center"],
            (object)  ['name'=>'Valorisation','propertyName'=>'prix','visible'=>false,"classStyle"=>""],
            (object)  ['name'=>'Notes','propertyName'=>'notes','visible'=>false,]
        ];
    }

    public function lignes(){

        $lA=$this->ajustement->ligne_ajustements;

        $json = DataTables::of($lA)
            ->addColumn('produit',function($la){
                $srcImag='images/produits/'.$la->produit->img;
                return "<img src=".asset($srcImag)."
                       width='35px'
                       height='35px'
                       class='rounded-circle'
                       >
                <a href='".url("produit/".$la->produit->id)."' class='lien-sp ft-14px ml-2'>".$la->produit->libelle."</a>";
            })

             ->addColumn('categorie',function($la){
                 return $la->produit->groupe_produit->groupe_name;
            })
            ->addColumn('code',function($la){
                return $la->produit->code;
                })
            ->addColumn('stock',function($la){

                $className="badge-primary";
                if($la->ajuste){
                    if($la->qteAvant > $la->qteReelle){
                        $className="badge-warning";
                    }
                    else if($la->qteAvant < $la->qteReelle){
                        $className="badge-success";
                    }
                }
                    return view('components.generic.bagde.compare')

                            ->with('text1',$la->qteAvant)
                            ->with('text2',$la->qteReelle)
                            ->with('separateur','    ->     ')
                            ->with('className',$className);

            })

            ->addColumn('ajuste',function($la){

                if($la->ajuste){
                    return view('components.generic.bagde.simple')
                    ->with('name','')
                    ->with('classStyle','bg-success');
                }
                else{
                    return view('components.generic.bagde.simple')
                    ->with('name','')
                    ->with('classStyle','bg-danger');
                }

            })


            ->addColumn('prix',function($lA){
                $lA->produit->prixAchatMin;
            })

            ->rawColumns(['produit','code','categorie','stock','ajuste','notes'])
                    ->make(true);
                    $response=$json->getData(true);
                   // dd($json);
                    //dd($response['data']);
                    return $response['data'];
        }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.produit.ajustement.voir-ajustement');
    }
}
