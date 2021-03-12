<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LignePayementVentes;
use App\Models\LigneVentes;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
      
        $rules=[
            'client'=>'required|integer',
            'produits.'=>'required',
            'quantiteD.*'=>'nullable|integer',
            'quantiteR.*'=>'required|integer',
            'categories.*'=>'required',
            'mrecu'=>'required',
            'unites.'=>'required',
            'prix.'=>'required',
            'montantT.'=>'integer',
            'livraison'=> [
                'required',
                Rule::in(['complet', 'incomplet']),
                ],
                
            


        ];
        $messages=[ 

        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($request){
            for ($i=0; $i <count($request->produits) ; $i++) {
                if($request->quantiteD[$i]<$request->quantiteR[$i]){
                    echo'dddd';
                    $validator->errors()->add('quantiteD','La quantite Demande doit etre superieur à la quantité reçue ');
                }
            }
            
        });
       
        if($validator->fails()){
            return 'faux';
        }
        else 
        return true;

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
                    $quantite=0;
                    if($request->livraison=="complet")
                        $quantite=$lv->quantiteDemande; 
                    else
                        $quantite=$lv->quantiteRecu; 



                    $montant+=$lv->prixUnite * $lv->quantiteD;
                  
                   if( $lv->save()){
                       $produit->qteStock-=$quantite;
                   }              

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
        } catch(\Exception $ex){
            DB::rollBack();
            return response()->json([
                "status"=>false,
                "message"=>"Quelque chose s'est mal passé lors de l'enregistrement. Veuillez  réessayer plus tard!",
                'data'=>$ex->getMessage(),                 
            ]);
        
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
