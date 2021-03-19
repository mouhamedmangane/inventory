<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GroupeProduit;
use App\Models\LignePayementVentes;
use App\Models\LigneVente;
use App\Models\LigneVenteRecu;
use App\Models\LigneVentes;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
        return view('page.vente.liste');
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
        if($request->client==0){//s'il n est pas un client
            $rules['mrecu']='required';

        }

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($request){
           
            if(!$request->produits){
                $msg="Aucune ligne de vente n'a été enregistrée";
                $validator->errors()->add('',$msg);
            }
            if($request->quantiteD){
                for ($i=0; $i <count($request->produits) ; $i++) {
                    if($request->quantiteD[$i]<$request->quantiteR[$i]){                        
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
        $client= new Client();
    

        $vente->numeroVente="CL".$request->client."V".(DB::table('ventes')->count()+1);
       
        DB::beginTransaction();
        try {                   
            $vente->save(); 

            if($request->produits){//existe au moins 1 produit selectionné
                $montant=0;
               for ($i=0; $i <count($request->produits) ; $i++) {                 
                    $lv=new LigneVente();
                    $produit=Produit::findOrFail($request->produits[$i]);
                    $lv->produit_id=$produit->id;
                    $lv->vente_id=$vente->id;
                    $lv->prixUnite=$request->prix[$i];
                    $lv->quantiteDemande=$request->quantiteD[$i];;
                    $lv->quantiteRecu=$request->quantiteR[$i];;
                    $lv->unite=$request->unites[$i]; 
                    $quantite=0;                   
                    $quantite=$lv->quantiteRecu;             
                
                     if($lv->save()){
                       $produit->qteStock-=$quantite;//decrémenté le stock
                       $produit->save();                       
                        $ligneVenteRecu= new LigneVenteRecu();
                        
                        //pour enregistrer livraison
                       // $ligneVenteRecu-> quantité et la quantité restant pour le produit
                        $montant+=$lv->prixUnite * $lv->quantiteDemande;
                   }       
                            

                }

                $lignePaie=new LignePayementVentes();                
                $lignePaie->montant=$request->mrecu;
                $lignePaie->montantRestant=$montant-$request->mrecu;
                $lignePaie->vente_id=$vente->id;                         
                $lignePaie->save();
                $vente->montantTotal=$montant;                    
                if($request->client>0){//s'il le client est mentionné
                    $client= Client::findOrFail($request->client);
                    $vente->client_id=$client->id;
                    $client->compte-=$montant;   
                    if($request->mrecu){
                        $client->compte+=$request->mrecu;                        
                    }
                    $client->save();
                }
                else
                    $vente->client_id=null;

                $vente->save();            
            }       


         DB::commit();
         return response()->json([
            "status"=>true,
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
        
        $vente= Vente::findOrFail($id);
        return view('page.vente.voir',compact('vente'));
        
        
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
    public function saveLivraison(){

    }
    public function savePayement(){

    }
    public function returnVentes(){

        $ventes=Vente::all();
        $status="true";
        $message='';
   
        $dataTable = DataTables::of($ventes)
            
            ->addColumn('client',function($vente){
                return $vente->client->nom;
            })  
            ->addColumn('montantRestant',function($vente){
                return $vente->montantTotal - $vente->ligne_payement_ventes->sum('montant')." FCFA" ;
            })  
            ->addColumn('produits',function($vente){
                return $vente->ligne_ventes->count()." produits achetés";
            })   
            ->addColumn('statut',function($vente){
                return $vente->complet;
            }) 
            // ->addColumn('montantTotal',function($vente){
            //     return $vente->montantTotal;
            // }) 
            ->addColumn('numeroVente',function($vente){
                return "<a href="">" 
                        .$vente->numeroVente;
            }) 
            ->rawColumns(['numeroVente','client','montantTotal','montantRestant','produits','statut'])
            ->with('status',$status)
            ->with('message',$message)
            ->toJson();
        
        return $dataTable;

       
    }
}
