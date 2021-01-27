<?php

namespace App\Http\Controllers;

use App\Models\GroupeProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\View\Components\Generic\Bagde\Simple;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Expr\ArrowFunction;

use function GuzzleHttp\Promise\all;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function getData(Request $request){
         $produits =Produit::all();
        $status=true;
        $message='Test';

         $json= DataTables::of($produits)
            ->addColumn('seuilstock',function($produit){               
                $classStyle = 'badge-success';
                if($produit->qteStock < $produit->qteSeuil) 
                    $classStyle = 'badge-danger';
                else if($produit->qteStock == $produit->qteSeuil)
                    $classStyle = 'badge-warning';
                
                return view('components.generic.bagde.simple')
                            ->with('name',$produit->qteStock.' | '.$produit->qteSeuil)
                            ->with('classStyle',$classStyle)
                            ->with('unite',$produit->unite);
            })           
            ->addColumn('categorie',function($produit){                
                return $produit->groupe_produit->groupe_name?$produit->groupe_produit->groupe_name:'Néant';
            })
            ->addColumn('fournisseur',function($produit){
                return ;
            })     
            ->addColumn('prixVente',function($produit){
                if($produit->prixVenteMax > 0){
                    return "[$produit->prixVenteMin ,$produit->prixVenteMax]";
                }
                else{
                    return $produit->prixVenteMin;
                }
            })
            ->addColumn('prixAchat',function($produit){
                if($produit->prixVenteMax > 0){
                    return "[$produit->prixVenteMin ,$produit->prixVenteMax]";
                }
                else{
                    return $produit->prixVenteMin;
                }
            })
            ->rawColumns(['libelle','categorie','qteStock','code','prixVente',"prixAchat",'seuilstock','rI','forunisseur'])
            ->with('status',$status)
            ->with('message',$message)
            ->toJson();
          return $json;
     }
    public function index()
    {
        //
        
        
        

        return view('page.produit.list');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=GroupeProduit::all();
        
        //variable pour dire si c'est produit composé ou pas
        $estcompose=false;

        return view('page.produit.new',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //les fournisseurs les clients et leur prix dans les parties achats et ventes4
        // reduction ventes et achats
        //enregister l'image dans un fichier identifié avec l'id
      
        
        $validator = Validator::make($request->all(), [
            'libelle' => 'required|unique:produits',
            'code' => 'required|unique:produits',
            'qteStock' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'qteSeuil' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'categorie' => 'nullable|integer|not_in:0',         
            'categorie' => 'nullable|integer|not_in:0',         
            'categorie' => 'nullable|integer|not_in:0',         
           

            

        ],$messages=[
            'required'=>"Le champ ':attribute' doit être renseigné'",
            'unique'=>"Le champ ':attribute' existe déjà dans la base",
        ]);
        $achat=false;
        $vendre=false;
        //verification si le produit est achetable ou vendable
        if($request->achatable_vendable){
            foreach($request->achatable_vendable as $av){
                if($av==="vendre") $vendre=true;            
                elseif($av==="acheter") $achat=true;
            }
        }
        
        
        $validator->after(function ($validator) use ($request,$vendre,$achat){
            if($vendre){
                if($request->prix_vente_min==null){
                    $validator->errors()->add('prix_vente_min','Le prix de vente n\'est pas renseigné');
                }
               else if($request->prix_vente_max!=null && $request->prix_vente_min >= $request->prix_vente_max){
                    $validator->errors()->add('prix_vente_max','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
              }
            }
            if($achat){
                if($request->prix_achat_min==null){
                    $validator->errors()->add('prix_achat_min','Le prix d\'achat n\'est pas renseigné');
                }
               else if($request->prix_achat_max!=null && $request->prix_achat_min >= $request->prix_achat_max){
                    $validator->errors()->add('prix_achat_max','Le prix d\'achat maximal doit être supérieur au prix d\'achat Minimal');
              }
            }
        });

        
     dd($validator->errors());

        if ($validator->fails()) {
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire sont mal saisi ou sont incorrects:",
                'data'=>//(object)$validator->errors(),
                    (object)['libelle'=> 'erreur'],                  
                
            ]);
        }
       
       
         

        $produit= new Produit();

        $produit->libelle=$request->libelle;
    
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        $produit->type=$request->type;
        $produit->qteSeuil=$request->qteSeuil;
        $produit->qteStock=$request->qteStock;
        $produit->groupe_name=$request->groupe_name;
        $produit->unite=$request->unite;


        // if (!$request->type) {
        //     $produit->type='consommable';
        // }
        // else
        //  $produit->type=$request->type;
        
    

        $produit->qteStock=$request->qteStock;
        $produit->qteSeuil=$request->qteSeuil;

        $produit->prixAchatMin=$request->prixMinAchat;
        $produit->prixVenteMax=$request->prixMinVente;

    //    $data=[];
    //    $data['status']= $produit->save();
    //    $data['message']='Certains champs n\'ont pas ou ont été mal renseigné';
      // $data['data']= $validated->errors();






    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illumina te\Http\Response
     */
    public function show($id)
    {
        //
        $produit= new Produit();
        $produit = Produit::find($id);

        return view('page.produit.new', $produit);
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
