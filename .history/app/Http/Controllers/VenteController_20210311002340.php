<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GroupeProduit;
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
     // dd($request);
        $rules=[
            'client'=>'required|integer',
            'produits.*'=>'required|distinct',
            'quantiteD.*'=>'nullable|integer',
            'quantiteR.*'=>'required|integer',
            'categories.*'=>'required',
            'mrecu'=>'required|double',
            'unites.*'=>'required',
            'prix.*'=>'required',
            'montantT.*'=>'nullable|integer',
            'livraison'=> [
                'required',
                Rule::in(['complet', 'incomplet']),
                ],
        ];
        $messages=[ 

        ];

        $validator = Validator::make($request->all(), $rules,$messages);

        
        $validator->after(function ($validator) use ($request){
           
            if(!$request->produits){
                $msg="Aucune ligne de vente n'a été enregistrée";
                $validator->errors()->add('',$msg);
            }
            if($request->quantiteD){
                for ($i=0; $i <count($request->produits) ; $i++) {
                    if($request->quantiteD[$i]<$request->quantiteR[$i]){
                        echo'dddd';
                        $validator->errors()->add('quantiteD','La quantite Demande doit etre superieur à la quantité reçue ');
                    }
                 }
            }
          
            
        });
       
        if($validator->fails()){ 
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                'errors'=>$validator->errors()
                ])  ;
                                   
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
                    $quantite=0;
                    if($request->livraison=="complet")
                        $quantite=$lv->quantiteDemande; 
                    else
                        $quantite=$lv->quantiteRecu; 
                    
                
  
                   if( $lv->save()){
                       $produit->qteStock-=$quantite;
                       $produit->save();                       
                     
                        $montant+=$lv->prixUnite * $lv->quantiteDemande;
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
         return response()->json([
            "status"=>false,
            "message"=>"Vente effectué avec succès",
            'errors'=>''
            ])  ;
                        
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
        try {            
            $vente= Vente::findOrFail($id);
            return view('page.vente.voir-vente',compact('vente',$vente));

        } catch (\Exception $e) {

            return backk;
        }
        
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

    public function getProducts(Request $request,$id){
        $json=[];
        $categorie=GroupeProduit::findOrFail($id);
        if($categorie){
            $json['status']=false;
            $produits=Produit::select('id' ,'libelle' ,'unite','prixVenteMin','prixVenteMax')->where('archived',false)
                                                                                            ->where('groupe_produit_id',$id)
                                                                                            ->where('vendable',true)
                                                                                            ->get();
            $json['data']=$produits;
        
        }   
        
        return response()->json($json);
    
    }
}
