<?php

namespace App\Http\Controllers;

use App\Models\Ajustement;
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
      try
      {
        $ajustement= new Ajustement();    
        $ajustement->save();
        
        
            foreach ($request->LigneAjustements as $ligneAjus) {
                if($ligneAjus->qteReelle){
                  
                    $lA= new LigneAjustement();
                    $lA->description= $ligneAjus->description;
                    $lA->pu= $ligneAjus->pu;
                    $lA->qteAvant  = $ligneAjus->qteAvant;
                    $lA->qteReelle  = $ligneAjus->qteReelle;
                    $lA->ajustement_id=$ajustement->id;
                    //etc

                    $produit= Produit::find($ligneAjus->produit_id);

                    DB::update('update produits set qteStock ='.$ligneAjus->qteReelle.'where id = ?', [$produit->id]);
                    $lA->save();description


                    DB::commit();
                }
            }   
       

        } catch(\Exception $ex){
            DB::rollBack();
            return response()->json(['error' => $ex->getMessage()], 500);
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
