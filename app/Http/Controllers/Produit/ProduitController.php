<?php

namespace App\Http\Controllers\Produit;

use App\Models\GroupeProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Composant;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


use function GuzzleHttp\Promise\all;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected  $validator;
    protected  $vendable=false;
    protected $achatable=false;


     public function returnData(){

        if($data="non_archived"){
            $produits =Produit::where('archived',false);
            $message='Les produits non archivés';
        }
        else if($data="archived"){
              $produits =Produit::where('archived',true);
              $message='Les produits archivés';
        }
           $status=true;

         $json = DataTables::of($produits)
            ->addColumn('libelle',function($produit){
                $srcImag='images/produits/'.$produit->img;
                return " <a href='".url("produit/".$produit->id)."' class='lien-sp ft-14px ml-2'>".$produit->libelle."</a>";
            })
            ->addColumn('image',function($produit){
                $srcImag='images/produits/'.$produit->img;
                return "<img src=".asset($srcImag)."
                       width='35px'
                       height='35px'
                       class='rounded-circle'
                       >";

             })
             ->addColumn('categorie',function($produit){
                return $produit->groupe_produit->groupe_name;
           })
            ->addColumn('code',function($produit){
            return "<code class='text-muted '>$produit->code</code>";
                })

            ->addColumn('seuilstock',function($produit){
                $className="badge-warning";

                    if($produit->qteStock < $produit->qteSeuil){
                        $className="badge-danger";
                    }
                    else if($produit->qteStock > $produit->qteSeuil){
                        $className="badge-success";
                    }

                return view('components.generic.bagde.compare')
                            ->with('text1',$produit->qteStock)
                            ->with('text2',$produit->qteSeuil)
                            ->with('separateur',' /  ')
                            ->with('className',$className);
            })
            ->addColumn('status_stock',function($produit){

                $classStyle = 'bg-success';
                if($produit->qteStock <=0 && $produit->qteSeuil<=0){
                    return view('components.generic.bagde.simple')
                    ->with('name','')
                    ->with('classStyle','bg-warning');
                }
                else if($produit->qteStock < $produit->qteSeuil)
                    $classStyle = 'bg-danger';
                else if($produit->qteStock == $produit->qteSeuil)
                    $classStyle = 'bg-warning';

                return view('components.generic.bagde.simple')
                            ->with('name','')
                            ->with('classStyle',$classStyle);

            })
            ->addColumn('fournisseur',function($produit){
            })
            ->addColumn('prixVente',function($produit){
                if($produit->prixVenteMin==NULL)
                    return "-";
                if($produit->prixVenteMax != $produit->prixVenteMin){
                    return
                        "
                    <table>
                        <tr style='line-height: 0% ;'>
                                <th style='width: 30%;'> <span class='font-weight-lighter text-muted text-align-center' style='font-size:9px '>min</span></th>
                                <th style='width: 30%;'> <span class='font-weight-lighter text-muted text-align-center' style='font-size:9px '>max</span></th>

                        </tr>
                        <tr style='line-height: 0% ;'>
                            <th class=''> <span class='font-weight-bold' >$produit->prixVenteMin</span></th>
                            <th > <span class='font-weight-lighter'>$produit->prixVenteMax</span></th>
                        </tr>
                    </table>
                        ";
                }
                else{
                    return "  <tr class='align-middle'style='line-height: 0% ;'>
                                <th classœ='align-middle'> <span class='font-weight-lighter'>$produit->prixVenteMin</span></th>
                             </tr>";
                }
            })
            ->addColumn('prixAchat',function($produit){
                if($produit->prixVenteMax > 0){
                    return "[$produit->prixVenteMin - $produit->prixVenteMax]";
                }
                else{
                    return $produit->prixVenteMin;
                }
            })
            ->rawColumns(['image','libelle','code','categorie','seuilstock',"prixAchat",'prixVente','rI','fournisseur'])
            ->with('status',$status)
            ->with('message',$message)
            ->toJson();
          return $json;
     }
    public function index()
    {
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
       // $categories=GroupeProduit::all();
        //variable pour dire si c'est produit composé ou pas
        $estcompose=false;

        return view('page.produit.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //dd($request);
        $validator=$this->setValidProduct($request);

        if ($validator->fails()) {
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                'errors'=>$validator->errors(),


            ]);
        }
        $produit= new Produit();
        $produit->libelle=$request->libelle;
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        $produit->qteSeuil=$request->qteSeuil;
        $produit->qteStock=$request->qteStock;
        $produit->groupe_produit_id=GroupeProduit::find($request->categorie)->id;
        $produit->unite=$request->unite;
        $produit->vendable=$this->achatable;
        $produit->achetable=$this->vendable;

        if (!$request->type) {
            $produit->type='consommable';
        }
        else
             $produit->type=$request->type;

        $produit->qteStock=$request->qteStock;
        $produit->qteSeuil=$request->qteSeuil;
        $produit->prixVenteMin=$request->prix_vente_min;

        if(isset($request->prix_vente_max) && $request->prix_vente_max > $request->prix_vente_min )
          $produit->prixVenteMax=$request->prix_vente_max;
        else
          $produit->prixVenteMax=$request->prix_vente_min;



        $produit->prixAchatMin=$request->prix_achat_min;
        if(isset($request->prix_achat_max) && $request->prix_achat_max > $request->prix_achat_min)
          $produit->prixAchatMax=$request->prix_achat_max;
        else
          $produit->prixAchatMax=$request->prix_achat_min;

        $test="";

        //enregistrement de la photo
         try {
            DB::beginTransaction();

                if($produit->save()){
                  //  $tes="aaaa";
                    if($request->hasFile('photo')) {
                        $image = $request->file('photo');
                        $ext = $image->getClientOriginalExtension();
                        $filename = $produit->id.'.'.$ext;
                        $save = $image->move('images/produits', $filename);
                        $produit->img=$filename;
                        if($save)
                            $produit->save();
                    }


                    if($request->produits){
                        //dd($request->produits);
                        $products=$request->produits;
                        for ($i=0; $i <count($products); $i++) {
                            $composant= new Composant();
                            $composant->paquet_id=$produit->id;
                            $prod = Produit::findOrFail($products[$i]);
                            $composant->produit_id=$prod->id;
                            $composant->quantite=(double) $request->quantite[$i];
                            $composant->unite= $prod->unite;
                            $composant->save();
                        }
                    }
                    DB::commit();
                    return response()->json([
                        "status"=>true,
                        "message"=>"Le produit a été enregistré avec succès ",
                        'data'=>'',
                        'id'=>$produit->id
                    ]);
                }
                else{
                    return response()->json([
                        "status"=>false,
                        "message"=>"Quelque chose s'est mal passé lors de l'enregistrement. Veuillez  réessayer plus tard!",
                        'data'=>''
                    ]);
                }
            }
             catch(\Exception $ex){
                DB::rollBack();
                return response()->json([
                    "status"=>false,
                    "message"=>"Quelque chose s'est mal passé lors de l'enregistrement. Veuillez  réessayer plus tard!",
                    'data'=>$ex->getMessage()
                ]);

             }
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
        $produit = Produit::findOrFail($id);

        return view('page.produit.view_product', compact("produit"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $produit= Produit::findOrFail($id);

       return view('page.produit.modifier',compact("produit"));


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
        //Validation avant la quantité stock

        $validator=$this->setValidProduct($request,"update");

        if ( $validator->fails()) {
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                'errors'=>$validator->errors(),


            ]);
        }
       //dd($request);

        if($request->prix_vente_max)
          $prixVenteMax=$request->prix_vente_max;
        else
          $prixVenteMax=$request->prix_vente_min;

        if($request->prix_achat_max)
          $prixAchatMax=$request->prix_achat_max;
        else
          $prixAchatMax=$request->prix_achat_min;




        $produit = Produit::findOrFail($id);
            $produit->libelle=$request->libelle;
            $produit->groupe_produit_id=$request->categorie;

            $produit->prixAchatMin=$request->prix_achat_min;
            $produit->prixAchatMax=$prixAchatMax;
            $produit->prixVenteMin=$request->prix_vente_min;
            $produit->prixVenteMax=$prixVenteMax;
            $produit->code=$request->code;
            $produit->vendable=$this->vendable;
            $produit->achetable=$this->achatable;
            $produit->qteSeuil=$request->qteSeuil;
            if($request->hasFile('photo')) {
                $image = $request->file('photo');
                $ext = $image->getClientOriginalExtension();
                $filename = $produit->id.'.'.$ext;
                $save = $image->move('images/produits', $filename);
                $produit->img=$filename;

            }

        if($produit->save()) {

            return response()->json([
                "status"=>true,
                "message"=>"Modification Reussie",
                'id'=>$produit->id,
                'errors'=>'',


            ]);
        }
        else{
            return response()->json([
                "status"=>true,
                "message"=>"Non Modifié:",
                'errors'=>$validator->errors(),


            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //supprimer au cas où aucun enregistrement(vente, achat, depenses, ) n'a été fait pour se produit sinon archive
        $produit= new Produit();
        $produit = Produit::find($id);
        $produit->archived=false;
        $produit->save();
        return response()->json([
            "status"=>true,
            "message"=>"Modification Reussie",
            'errors'=>''   ]);


    }
    public function deleteProducts(Request $request){
        $produits =Produit::where('archived',false);

        do
        {

        }while($produits);


    }

    public function setValidProduct(Request $request,$action="save"){
        $rules=[
            //image pour l'image de type image
            'libelle' => 'required|unique:produits',
            'code' => 'required|unique:produits',
            'qteStock' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'qteSeuil' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',//decimal
            'prix_vente_min' => 'nullable|integer|not_in:0',
            'prix_vente_max' => 'nullable|integer|not_in:0',
            'prix_achat_min' => 'nullable|integer|not_in:0',
            'prix_achat_max' => 'nullable|integer|not_in:0',
             'rI' => 'nullable|unique:produits',
             'categorie'=>'exists:groupe_produits,id'

        ];

        if($action!="save"){
            $rules=[

            ];
        }

        $messages=[
            'required'=>"Le champ ':attribute' doit être renseigné'",
            'unique'=>"Le champ ':attribute' existe déjà dans la base",
            'regex'=>"Le champ ':attribute' doit être nombre décimal ou entier ",
            'not:in'=>"Le champ ':attribute' doit être positive ",


        ];
        if($request->produits){ //composants
            $rules['produits.*']='required';
            $rules['quantite.*']='required|regex:/^\d+(\.\d{1,2})?$/|not_in:0';

        }

// ----------- REDUCTION -----------------

        // if($request->reductions){
        //     $rules['reduction_name.*']="required|unique:reductions";
        //     $rules['apartir.*']= 'required|numeric|min:1|not_in:0';
        //     $rules['pourcentage.*']= 'nullable|numeric|min:0|max:100|not_in:0';
        //     $rules['datedebut.*']= 'required|datetime|after_or_equal:today';
        //     $rules['datefin.*']= 'nullable|datetime|after_or_equal:datedebut';
        //     $rules['client.*']='required|integer|min:1';
        //     $rules['pu.*']='required|integer|min:1'; //gt:champ




        // }

        $this->validator = Validator::make($request->all(), $rules
            ,$messages);

        //dd($this->validator= );
        if($request->achatable_vendable){
            foreach($request->achatable_vendable as $av){
                if($av==="vendre") $this->vendable=true;
                elseif($av==="acheter") $this->achatable=true;
            }
        }
        $this->validator->after(function ($validator) use ($request){
            if($this->vendable){
                if($request->prix_vente_min==null){
                     $this->validator->errors()->add('prix_vente_min','Le prix de vente n\'est pas renseigné');
                }
               else if($request->prix_vente_max!=null && $request->prix_vente_min > $request->prix_vente_max){
                    $this->validator->errors()->add('prix_vente_max','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
              }
            }
            if($this->achatable){
                if($request->prix_achat_min==null){
                    $this->validator->errors()->add('prix_achat_min','Le prix d\'achat n\'est pas renseigné');
                }
               else if($request->prix_achat_max!=null && $request->prix_achat_min > $request->prix_achat_max){
                $this->validator->errors()->add('prix_achat_max','Le prix d\'achat maximal doit être supérieur au prix d\'achat Minimal');
              }
            }
        });

        return $this->validator;



    }



    public function getProducts(Request $request,$id){
        $json=[];
        $categorie=GroupeProduit::findOrFail($id);
        if($categorie){
            $json['status']=false;
            $produits=Produit::select('id' ,'libelle' ,'unite','prixVenteMin','prixVenteMax')->where('groupe_produit_id',$id)->get();
            $json['data']=$produits;
        }

        return response()->json($json);

    }
    public function getUnit(Request $request, $id){
        $json=[];
        $produit=Produit::findOrFail($id);
        if($produit){
            $json['status']=false;
            $unite=Produit::select('unite' ,'id')->where('id',$id)->where(['archived',false],[])->get();
            $json['data']=$unite;
            return response()->json($json);
        }
        $json['status']=true;
        $json['data']='';
        return response()->json($json);
    }


    public function archivedProduct($id){
        $this->validator = Validator::make($request->all(),[
            'id' => 'required|exists:produits,id',
            //'photo'
            ] );

        if($request->$id){
            $produit=Produit::findOrFail($request->id);

            $produit->archived=true;
            $produit->save();
        }

    }

    public function saveImgProduct($id){


        $this->validator = Validator::make($request->all(),[
            'id' => 'required|exists:produits,id',
            //'photo'
            ] );

        if($request->hasFile('photo')){
            //change tof
            $produit=Produit::findOrFail($id);
            if($produit){
                $image = $request->file('photo');
                $ext = $image->getClientOriginalExtension();
                $filename = $produit->id.'.'.$ext;
                $save = $image->move('images/produits', $filename);
                $produit->img=$filename;
                if($save)
                  $produit->save();//repertorie dans l'historique le changement de photo product

                return response()->json([
                    "status"=>true,
                    "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                    'errors'=>$validator->errors(),
                    ]);

            }

        }
        return response()->json([
            "status"=>false,
            "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
            'errors'=>$validator->errors(),
            ]);

     }
     public function archiver(Request $request){
        $validator=Validator::make($request->all(),
        [
            'role_select'=>'array|required',
            'role_select.*'=>['numeric','exists:App\Models\Role,id',]
        ]);
        if($validator->fails()){
            return response()->json(\App\Http\ResponseAjax\Validation::validate($validator));
        }
        else{
            return response()->json(\App\Http\ResponseAjax\UpdateRow::manyForOnAttr('roles',$request->role_select,
                                                                                            ['archiver'=>1],
                                                                                            'messages.nbr_update'));

        }
    }

}
