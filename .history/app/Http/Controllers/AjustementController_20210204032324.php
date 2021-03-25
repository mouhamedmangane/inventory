<?php

namespace App\Http\Controllers;

use App\Models\LigneAjustement;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AjustementController extends Controller
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
         $produitNonArchived = Produit::select('id','libelle','code','rI','qteStock','unite','prixVenteMin','prixVenteMax')
                            ->where('archived',false)
                            ->get();


        //ligne_ajusments id,id_produit,id_ajus,qte_ajusté,

        return view('page.produit.ajustement.create');
        
        
    }

    public function newAjust(){
     


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

        //validation

      DB::beginTransaction();
            foreach ($request->LigneAjustements as $ligneAjus) {
                if($ligneAjus->qteReelle){

                    $lA= new LigneAjustement();
                    $lA->description= $ligneAjus->description;
                    $lA->Pu= $ligneAjus->description;
                    $lA->qteAvant  = $ligneAjus->qteAvant;
                    
                }
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
