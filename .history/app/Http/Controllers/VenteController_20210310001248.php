<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LignePayementVentes;
use App\Models\LigneVentes;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('page.list-vente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('page.vente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $rules=[
            'client'=>'required',
            'produits.'=>'required',
            'quantiteD.'=>'',
            'quantiteR.'=>'required',
            'categories.'=>'required',
            'mrecu'=>'required',
            'unites.'=>'required',
            'prix.'=>'required',
            


        ];
        $messages=[ 

        ];

        $validator = Validator::make($request->all(), $rules,$messages);
        
        $this->validator->after(function ($validator) use ($request){
            if($this->vendable){
                if($request->prix_vente_min==null){
                     $this->validator->errors()->add('prix_vente_min','Le prix de vente n\'est pas renseigné');
                }
               else if($request->prix_vente_max!=null && $request->prix_vente_min >= $request->prix_vente_max){
                    $this->validator->errors()->add('prix_vente_max','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
              }
            }
            if($this->achatable){
                if($request->prix_achat_min==null){
                    $this->validator->errors()->add('prix_achat_min','Le prix d\'achat n\'est pas renseigné');
                }
               else if($request->prix_achat_max!=null && $request->prix_achat_min >= $request->prix_achat_max){
                $this->validator->errors()->add('prix_achat_max','Le prix d\'achat maximal doit être supérieur au prix d\'achat Minimal');
              }
            }
        });
        if($validator->fails()){
            return 'faux';
        }

        $vente= new Vente();
        $vente->client_id=$request->client>0?Client::findOrFail($request->client)->id:null;
        $vente->numeroVente="CL".$request->client."V".(DB::table('ventes')->count()+1);
       
        DB::beginTransaction();
        try {                   
            $vente->save(); 

            if($request->produits){//existe au moins 1 produit selectionné
                $montant=0;
               for ($i=0; $i <count($request->produits) ; $i++) {                 
                    $lv=new LigneVentes();
                    $produit=Produit::findOrFail($request->produits[$i]);

                    $lv->produit_id=$produit->id;
                    $lv->vente_id=$vente->id;
                    $lv->prixUnite=$request->prix[$i];
                    $lv->quantiteDemande=$request->quantiteD[$i];;
                    $lv->quantiteRecu=$request->quantiteR[$i];;
                    $lv->unite=$request->unites[$i];

                    $montant+=$lv->prixUnite * $lv->quantiteD;
                  
                    $lv->save();              

                }

                $lignePaie=new LignePayementVentes();
                
                $lignePaie->montant=$request->mrecu;
                $lignePaie->montantRestant=$montant-$request->mrecu;
                $lignePaie->vente_id=$vente->id;


                $vente->montantTotal=$montant;

                $lignePaie->save();

                $vente->save();            
            }       


         DB::commit();
         dd('vente effectué');
        } catch (\Exception $e) {
            DB::rollback();

            dd('vente non effectué'.$e->getMessage());
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
