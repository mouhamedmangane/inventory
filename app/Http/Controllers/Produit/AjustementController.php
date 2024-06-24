<?php

namespace App\Http\Controllers\Produit;

use App\Models\Ajustement;
use App\Models\LigneAjustement;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;


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

        $ajustements=Ajustement::paginate(50);

        return view('page.produit.ajustement.list',\compact("ajustements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // l'inventaire des produits non archivés

         $produits = Produit::select('id','libelle','code','rI','qteStock','unite','prixVenteMin','prixVenteMax')
                            ->where('archived',false)
                            ->get();


        //ligne_ajusments id,id_produit,id_ajus,qte_ajusté,

        return view('page.produit.ajustement.create',\compact("produits"));


    }


    public function returnData(){


         $status=true;
         $ajustements=Ajustement::all();
        // dd($ajustements);

         $json = DataTables::of($ajustements)
            ->addColumn('inventaire',function($ajustement){
                return"
                        <a href='".url("produit/ajustement/".$ajustement->id)."' class='lien-sp ft-14px ml-2'>".$ajustement->numero."</a>";
            })

            ->addColumn('nbre_prod_ajuste',function($ajustement){
                return 5;
           })
           ->addColumn('date',function($ajustement){
                 return $ajustement->created_at;
           })


            ->rawColumns(['inventaire','nbre_prod_ajuste','date','note'])
            ->with('status',$status)
            ->with('message',"success")
            ->toJson();


          return $json;
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

        $rules=[
            //image pour l'image de type image
            'produits.*' => 'required|unique:produits',
            'qteReelle.*' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',//decimal
            'notes.*' => 'nullable',


        ];
        $messages=[
            'required'=>"Le champ ':attribute' doit être renseigné'",
            'unique'=>"Le champ ':attribute' existe déjà dans la base",
            'regex'=>"Le champ ':attribute' doit être un nombre décimal ou entier ",


        ];
        if($request->produits){ //composants
            $rules['produits.*']='required';
            $rules['quantite.*']='regex:/^\d+(\.\d{1,2})?$/|not_in:0';

        }
        // if($request->reductions){
        //     $rules['reduction_name.*']="required|unique:reductions";
        //     $rules['apartir.*']= 'required|numeric|min:1|not_in:0';
        //     $rules['pourcentage.*']= 'nullable|numeric|min:0|max:100|not_in:0';
        //     $rules['datedebut.*']= 'required|datetime|after_or_equal:today';
        //     $rules['datefin.*']= 'nullable|datetime|after_or_equal:datedebut';
        //     $rules['client.*']='required|integer|min:1';
        //     $rules['pu.*']='required|integer|min:1'; //gt:champ




        // }

        $this->validator = Validator::make($request->all(), $rules,$messages);



      DB::beginTransaction();
      try
      {
        $ajustement= new Ajustement();
        $ajustement->save();
            foreach ($request->LigneAjustements as $ligneAjus) {
                $lA= new LigneAjustement();

                    $lA->notes= $ligneAjus->notes;
                    $lA->pu= $ligneAjus->pu;//prix pour ala valorisation de l'inventaire
                    $lA->qteAvant  = $ligneAjus->qteAvant;
                    $lA->qteReelle  = $ligneAjus->qteReelle;
                    $lA->ajustement_id=$ajustement->id;
                    //etc
                    $produit= Produit::findOrFail($ligneAjus->produit_id);
                    $lA->produit_id=$produit->id;

                    $lA= ($lA->qteAvant!=$lA->qtReelle);

                    DB::update('update produits set qteStock ='.$ligneAjus->qteReelle.'where id = ?', [$produit->id]);
                    $lA->save();
            }
            DB::commit();

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

        if(\is_numeric($id)){
            $ajustement= Ajustement::findOrFail($id);


            return view('page.produit.ajustement.voir_ajustement',compact("ajustement"));

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
}
