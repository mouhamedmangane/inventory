<?php

namespace App\Http\Controllers\Vente;

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
use App\Http\Controllers\Controller;


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
<<<<<<< HEAD
            'categories.*'=>'required',            
=======
            'categories.*'=>'required',
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            'unites.*'=>'required',
            'prix.*'=>'required',
            'montantT.*'=>'nullable|integer',
            'livraison'=> [
                'required',
                Rule::in(['complet', 'incomplet']),
                ],
        ];
<<<<<<< HEAD
        $messages=[ 
=======
        $messages=[
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455

        ];
        if($request->client==0){//s'il n est pas un client
            $rules['mrecu']='required';

        }

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($request){
<<<<<<< HEAD
           
=======

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            if(!$request->produits){
                $msg="Aucune ligne de vente n'a été enregistrée";
                $validator->errors()->add('',$msg);
            }
            if($request->quantiteD){
                for ($i=0; $i <count($request->produits) ; $i++) {
<<<<<<< HEAD
                    if($request->quantiteD[$i]<$request->quantiteR[$i]){                        
=======
                    if($request->quantiteD[$i]<$request->quantiteR[$i]){
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
                        $validator->errors()->add('quantiteD','La quantite Demande doit etre superieur à la quantité reçue ');
                    }
                 }
            }
        });
<<<<<<< HEAD
       
        if($validator->fails()){ 
=======

        if($validator->fails()){
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                'errors'=>$validator->errors()
                ])  ;
<<<<<<< HEAD
                                   
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
=======

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
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
                    $lv=new LigneVente();
                    $produit=Produit::findOrFail($request->produits[$i]);
                    $lv->produit_id=$produit->id;
                    $lv->vente_id=$vente->id;
                    $lv->prixUnite=$request->prix[$i];
                    $lv->quantiteDemande=$request->quantiteD[$i];;
                    $lv->quantiteRecu=$request->quantiteR[$i];;
<<<<<<< HEAD
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
=======
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
                echo $montant;
                //$vente->montantTotal=$montant;
                if($request->client>0){//s'il le client est mentionné
                    $client= Client::findOrFail($request->client);
                    $vente->client_id=$client->id;
                    $client->compte-=$montant;
                    if($request->mrecu){
                        $client->compte+=$request->mrecu;
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
                    }
                    $client->save();
                }
                else
                    $vente->client_id=null;

<<<<<<< HEAD
                $vente->save();            
            }       
=======
                $vente->save();
            }
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455


         DB::commit();
         return response()->json([
            "status"=>true,
            "message"=>"Vente effectué avec succès",
            'errors'=>''
            ])  ;
<<<<<<< HEAD
                        
=======

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
        } catch(\Exception $ex){
            DB::rollBack();
            return response()->json([
                "status"=>false,
                "message"=>"Quelque chose s'est mal passé lors de l'enregistrement. Veuillez  réessayer plus tard!",
<<<<<<< HEAD
                'data'=>$ex->getMessage(),                 
            ]);
        
         }
       
=======
                'data'=>$ex->getMessage(),
            ]);

         }

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        
        $vente= Vente::findOrFail($id);
        return view('page.vente.voir',compact('vente'));
        
        
=======

        $vente= Vente::findOrFail($id);
        return view('page.vente.voir',compact('vente'));


>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
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
<<<<<<< HEAD
        
        }   
        
        return response()->json($json);
    
=======

        }

        return response()->json($json);

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
    }
    public function saveLivraison(){

    }
    public function savePayement(){

    }
    public function returnVentes(){

        $ventes=Vente::all();
        $status="true";
        $message='';
<<<<<<< HEAD
   
        $data = DataTables::of($ventes)
            
=======

        $data = DataTables::of($ventes)

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            ->addColumn('client',function($vente){
                if($vente->client)
                    return $vente->client->nom;
                return "_";
<<<<<<< HEAD
            })  
            ->addColumn('montantRestant',function($vente){
                return $vente->montantTotal - $vente->ligne_payement_ventes->sum('montant')." FCFA" ;
            })  
            ->addColumn('produits',function($vente){
                return $vente->ligne_ventes->count()." produits achetés";
            })   
            ->addColumn('statut',function($vente){
                if($vente->complet) 
                   return '<span class="badge bagde-success circle">ok</span> ' ;
                else
                    return '<span class="badge bagde-danger circle">ok</span>';
            }) 
        
            ->addColumn('numeroVente',function($vente){
                return '<a href='.asset("/vente/view/$vente->id").'>' 
                        .$vente->numeroVente.
                        '</a>';     
            }) 
            ->addColumn('date',function($vente){
                return date('d-m-Y', strtotime($vente->created_at));    
            }) 
            ->addColumn('heure',function($vente){
                return date('H:i:s', strtotime($vente->created_at));
            }) 
=======
            })
            ->addColumn('montantRestant',function($vente){
                return $vente->montantTotal - $vente->ligne_payement_ventes->sum('montant')." FCFA" ;
            })
            ->addColumn('produits',function($vente){
                return $vente->ligne_ventes->count()." produits achetés";
            })
            ->addColumn('statut',function($vente){
                if($vente->complet)
                   return '<span class="badge bagde-success circle">ok</span> ' ;
                else
                    return '<span class="badge bagde-danger circle">ok</span>';
            })

            ->addColumn('numeroVente',function($vente){
                return '<a href='.asset("/vente/view/$vente->id").'>'
                        .$vente->numeroVente.
                        '</a>';
            })
            ->addColumn('date',function($vente){
                return date('d-m-Y', strtotime($vente->created_at));
            })
            ->addColumn('heure',function($vente){
                return date('H:i:s', strtotime($vente->created_at));
            })
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            ->rawColumns(['numeroVente','client','montantTotal','montantRestant','produits','date','heure','statut'])
            ->with('status',$status)
            ->with('message',$message)
            ->toJson();
<<<<<<< HEAD
        
        return $data;

       
=======

        return $data;


>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
    }
}
