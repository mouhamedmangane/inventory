<?php

namespace App\Http\Controllers\Produit;

use App\Models\Ajustement;
use App\Models\LigneAjustement;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon;
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
                $count=LigneAjustement::where('ajustement_id',$ajustement->id)->where('ajuste',true)->get()->count();
                //$count=$count->count();
                return $count;
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
            'stockReelle.*' => 'regex:/^\d+(\.\d{1,2})?$/',//decimal
            'notes.*' => 'nullable',


        ];
        $messages=[
            'required'=>"Le champ ':attribute' doit être renseigné'",
            'unique'=>"Le champ ':attribute' existe déjà dans la base",
            'regex'=>"Le champ ':attribute' doit être un nombre décimal ou entier ",


        ];

       // $this->validator = Validator::make($request->all(), $rules,$messages);



      DB::beginTransaction();
      try
      {
        $ajustement= new Ajustement();
        $ajustement->numero="A".now()->toDateTimeString();
        $ajustement->save();
        //dd($request);

        $produits=$request->produits;
            $tabProduits=[];
            for ($i=0; $i<count($produits); $i++) {
                $lA= new LigneAjustement();

                    $lA->notes= $request->notes[$i];
                    //$lA->pu= $request->prix[$i];//prix pour ala valorisation de l'inventaire

                    $produit= Produit::findOrFail($produits[$i]);
                    $lA->produit_id=$produit->id;
                    $lA->qteAvant  = $produit->qteStock;
                    $lA->qteReelle  = $request->stockRelle[$i];
                    $lA->ajustement_id=$ajustement->id;
                    //etc

                    $tabProduits[]=$produit->id;
                    $lA->ajuste = ($lA->qteAvant!=$lA->qtReelle);

                    DB::update('update produits set qteStock ='.$lA->qteReelle.' where id = ?', [$produit->id]);
                    $lA->save();
            }

            $products=Produit::all();
           // dd($products);
            foreach ($products as $product) {
                $lA= new LigneAjustement();
                if (!in_array($product->id,$tabProduits)) {
                    //$lA->pu= 0;//prix pour a la valorisation de l'inventaire
                    $lA->qteAvant  = $product->qteStock;
                    $lA->qteReelle  = $product->qteStock;
                    $lA->ajustement_id=$ajustement->id;
                    $lA->produit_id=$product->id;
                    $lA->save();

                }
            }

            DB::commit();
            return response()->json([
                "status"=>true,
                "message"=>"Ajustement a été enregistré avec succès ",
                'data'=>''
            ]);

        } catch(\Exception $ex){
            DB::rollBack();
            return response()->json([
                "status"=>false,
                "message"=>"No AJustement ",
                'data'=>$ex->getMessage()
            ]);
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
