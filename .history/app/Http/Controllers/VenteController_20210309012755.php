<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\LignePayementVentes;
use App\Models\LigneVentes;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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
        dd($request);
        $rules=[
            'client'=>'required',
            'produits.'=>'required',
            'quantiteD.'=>'',
            'quantiteR.'=>'required',
            'categories.'=>'required',
            'montantRecu'=>'required',


        ];
        $messages=[ 

        ];
        $vente= new Vente();
        $vente->client_id=$request->client>0?Client::findOrFail($request->client)->id:null;
        $vente->numeroVente="C".$request->client."V".DB::table('ventes')->count()+1;
       
        DB::beginTransaction();
        try { 
            
        
            $vente->save(); 

            if($request->produits){//existe au moins 1 produit selectionné
                $montant=0;
               for ($i=0; $i <count($request->produits) ; $i++) { 
                
                    $lv=new LigneVentes();
                    $lv->produit_id=Produit::find($request->produits[$i])->id;
                    $lv->vente_id=$vente->id;
                    $lv->prixUnite=$request->prix[$i];
                    $lv->quantiteDemande=$request->quantiteD[$i];;
                    $lv->quantiteRecu=$request->quantiteR[$i];;
                    $lv->unite=$request->unite;
                    
                    

                    $montant+=$lv->prixUnite*$lv->quantiteD;

                    $lv->save();

                    

                }
                $lignePaie=new LignePayementVentes();
                
                $lignePaie->montant=$request->mrecu;
                $lignePaie->montantRestant=$montant

                $vente->montantTotal=$montant;


            }

            
            


         DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

            $validator = Validator::make($request->all(), $rules,$messages);
  
        if($validator->fails()){
            return 'faux';
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
