<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use DataTables;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function getData(Request $request){
         $json=[];
         $json['status']= true;
         $produits=Produit::all();
         $json['data']= DataTables::of($produits)
            ->addColumn('status',function($produit){
                return 'gmjlkm';
            })
            ->addColumn('rI',function($produit){
                return 'gmjlkm';
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
            ->rawColumns(['libelle','categorie','qteStock','code','prixVente',"prixAchat",'status','rI','forunisseur']);
          return response()->json($json);
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
        return view('page.produit.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      
        $validated = (object)$request->validate([
            'libelle' => 'required|unique:produits',
            'code' => 'required|unique:produits',
            // 'prixAchatMin' => 'required',
            // 'prixVenteMin' => 'required',
        ]);
        

      

        $produit= new Produit();
        $produit->libelle=$request->libelle;
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        if (!$request->type) {
            $produit->type='consommable';
        }
        if($produit->prixVenteMax<$produit->prixVenteMin){
             $validated->errors()->add('');
        }
        $produit->qteStock=$request->qteStock;
        $produit->qteSeuil=$request->qteSeuil;

        $produit->prixMinAchat=$request->prixMinAchat;
        $produit->prixMinVente=$request->prixMinVente;

       $data=[];
       $data['status']= $produit->save();
       $data['message']='Certains champs n\'ont pas ou ont été mal renseigné';
       $data['data']= "";



    
        
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
