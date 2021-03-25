<?php

namespace App\Http\Controllers;

use App\Models\GroupeProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use DataTables;
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
            ->addColumn('status',function($produit){
                return 'gmjlkm';
            })
           
            ->addColumn('categorie',function($produit){
                $categ=$produit->groupe_produit->groupe_name;
                return $produit->groupe_produit->groupe_name;
            })
            ->addColumn('fournisseur',function($produit){
                return 'gmjlkm';
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
            ->rawColumns(['libelle','categorie','qteStock','code','prixVente',"prixAchat",'status','rI','forunisseur'])
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
        //enregister l'image dans un fichier identifié avec l'id

    //    return
    //     $validated = (object)$request->validate([
    //         'libelle' => 'required|unique:produits',
    //         'code' => 'required|unique:produits',
    //         'prixAchatMin' => 'required',
    //         'prixVenteMin' => 'required',
    //     ]);
        

        

        $produit= new Produit();
        $produit->libelle=$request->libelle;
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        // if (!$request->type) {
        //     $produit->type='consommable';
        // }
        // else
        //  $produit->type=$request->type;

        if($produit->prixVenteMax<$produit->prixVenteMin){
            //  $validated->errors()->add('prixVenteMax','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
        }
        else{
            
        }

        $produit->qteStock=$request->qteStock;
        $produit->qteSeuil=$request->qteSeuil;

        $produit->prixAchatMin=$request->prixMinAchat;
        $produit->prixVenteMax=$request->prixMinVente;

       $data=[];
       $data['status']= $produit->save();
       $data['message']='Certains champs n\'ont pas ou ont été mal renseigné';
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
