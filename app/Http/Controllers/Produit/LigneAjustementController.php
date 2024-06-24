<?php

namespace App\Http\Controllers\Produit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class LigneAjustementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $ajustements=Ajustement::paginate(7);

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
         $ajustements=LigneAjustement::all();
        // dd($ajustements);

         $json = DataTables::of($ajustements)
            ->addColumn('produit',function($ajustement){
                $srcImag='images/produits/'.$ajustement->produit->img;
                return "<img src=".asset($srcImag)."
                       width='35px'
                       height='35px'
                       class='rounded-circle'
                       >
                <a href='".url("produit/".$produit->id)."' class='lien-sp ft-14px ml-2'>".$ajustement->produit->libelle."</a>";
            })

             ->addColumn('categorie',function($ajustement){
                 return $ajustement->produit->groupe_produit->groupe_name;
            })
            ->addColumn('stock',function($ajustement){
                return view('components.generic.bagde.compare')
                            ->with('text1',$ajustement->qteAvant)
                            ->with('text2',$ajustement->qteReelle)
                            ->with('separateur',' | ');
            })
            ->addColumn('ajuste',function($ajustement){

                if($ajustement->ajuste){
                    return view('components.generic.bagde.simple')
                    ->with('name','')
                    ->with('classStyle','bg-success');
                }
                else{
                    return view('components.generic.bagde.simple')
                        ->with('name','')
                        ->with('classStyle','bg-primary');
                }

            })
            ->addColumn('notes',function($lA){
                $lA->notes;
            })
            ->addColumn('prix',function($lA){
                $lA->produit->prixAchatMin;
            })
            ->rawColumns(['produit','cqtegorie','stock','ajuste','date',"prix",'notes'])
            ->with('status',$status)
            ->with('message',$message)
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
