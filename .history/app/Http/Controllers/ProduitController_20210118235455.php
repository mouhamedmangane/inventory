<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
      
        $validated = $request->validate([
            'libelle' => 'required|unique',
            'code' => 'required|unique',
            'prixAchatMin' => 'required',
            'prixVenteMin' => 'required',
        ]);
        

        dd($validated);

        $produit= new Produit();
        $produit->libelle=$request->libelle;
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        if (!$request->type) {
            $produit->type='consommable';
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
