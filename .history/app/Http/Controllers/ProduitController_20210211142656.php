<?php

namespace App\Http\Controllers;

use App\Models\GroupeProduit;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\View\Components\Generic\Bagde\Simple;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Expr\ArrowFunction;

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
        
        //if($data="non_archived"){
            $produits =Produit::where('archived',false);            
            $message='Les produits non archivés';
        // }
        // else if($data="archived"){
        //       $produits =Produit::where('archived',true);
        //       $message='Les produits archivés';
        // }
           $status=true;

         $json = DataTables::of($produits)
            ->addColumn('seuilstock',function($produit){               
                $classStyle = 'badge-success';
                if($produit->qteStock <=0 && $produit->qteSeuil<=0){
                    return view('components.generic.bagde.simple')
                    ->with('name','')
                    ->with('classStyle','badge-danger')
                    ->with('unite','');
                }
                else if($produit->qteStock < $produit->qteSeuil) 
                    $classStyle = 'badge-danger';
                else if($produit->qteStock == $produit->qteSeuil)
                    $classStyle = 'badge-warning';
                
                return view('components.generic.bagde.simple')
                            ->with('name',$produit->qteStock.'  |  '.$produit->qteSeuil)
                            ->with('classStyle',$classStyle)
                            ->with('unite',$produit->unite);
            })           
            ->addColumn('categorie',function($produit){                
                $categorie = GroupeProduit::find($produit->groupe_produit_id);
                return $categorie->groupe_name;
                //$produit->groupe_produit->groupe_name?$produit->groupe_produit->groupe_name:'Néant';
            })
            ->addColumn('image',function($produit){     
                  
                $srcImag='images/produits/'.$produit->img;

                 if(!is_file($srcImag))    
                    $srcImag='images/produits/0.png';//image par défaut

                return "<img src=".asset($srcImag)."
                        width='40px'
                        height='40px'
                        class='rounded-circle' 
                        >";
            })
            ->addColumn('fournisseur',function($produit){
                return "Ass";
            })     
            ->addColumn('prixVente',function($produit){
                if($produit->prixVenteMax > 0){
                    return "[$produit->prixVenteMin  --  $produit->prixVenteMax]";
                }
                else{
                    return $produit->prixVenteMin;
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
            ->rawColumns(['image','code','libelle','categorie','seuilstock',"prixAchat",'prixVente','rI','fournisseur'])
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
    public function store(Request $request)
    {
       
      
        //  $this->validator = Validator::make($request->all(), [
        //     'libelle' => 'required|unique:produits',
        //     'code' => 'required|unique:produits',
        //     'qteStock' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
        //     'qteSeuil' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',//decimal
        //     'prix_vente_min' => 'nullable|integer|not_in:0',         
        //     'prix_vente_max' => 'nullable|integer|not_in:0',         
        //     'prix_achat_min' => 'nullable|integer|not_in:0',         
        //     'prix_achat_max' => 'nullable|integer|not_in:0',     

        // ],$messages=[
        //     'required'=>"Le champ ':attribute' doit être renseigné'",
        //     'unique'=>"Le champ ':attribute' existe déjà dans la base",
        // ]);
      
        // verification si le produit est achetable ou vendable 
        // => pour savoir si les champs prix_vente et prix d'achat 'minimals) 
        // seront saisies obligatoirement

    
        // $achat=false;
        // $vendre=false;       


        // if($request->achatable_vendable){
        //     foreach($request->achatable_vendable as $av){
        //         if($av==="vendre") $vendre=true;            
        //         elseif($av==="acheter") $achat=true;
        //     }
        // }
        //  $this->validator->after(function ($validator) use ($request,$vendre,$achat){
        //     if($vendre){
        //         if($request->prix_vente_min==null){
        //              $this->validator->errors()->add('prix_vente_min','Le prix de vente n\'est pas renseigné');
        //         }
        //        else if($request->prix_vente_max!=null && $request->prix_vente_min >= $request->prix_vente_max){
        //              $this->validator->errors()->add('prix_vente_max','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
        //       }
        //     }
        //     if($achat){
        //         if($request->prix_achat_min==null){
        //              $this->validator->errors()->add('prix_achat_min','Le prix d\'achat n\'est pas renseigné');
        //         }
        //        else if($request->prix_achat_max!=null && $request->prix_achat_min >= $request->prix_achat_max){
        //              $this->validator->errors()->add('prix_achat_max','Le prix d\'achat maximal doit être supérieur au prix d\'achat Minimal');
        //       }
        //     }
        // });

        $this->getValidProduct($request);

        if ( $this->validator->fails()) {
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire sont mal saisi ou incorrects:",
                'data'=>(object) $this->validator->errors(),
                                   
                
            ]);
        }
        $produit= new Produit();
        //image
        
        $produit->libelle=$request->libelle;    
        $produit->code=$request->code;
        $produit->rI=$request->rI;
        $produit->type=$request->type;
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
        $produit->prixVenteMax=$request->prix_vente_max;    
        $produit->prixAchatMin=$request->prix_achat_min;
        $produit->prixAchatMax=$request->prix_achat_max;
        //enregistrement de la photo
     

        if($produit->save()){
            if($request->hasFile('photo')) {
             
                $image = $request->file('photo');        
                $ext = $image->getClientOriginalExtension();
                $filename = $produit->id.$ext;                  
                 $save = $image->move('images/produits', $filename);
                 $produit->img=$filename;
                 $produit->save();
            }
            
            
            return response()->json([
                "status"=>true,
                "message"=>"Le produit a été enregistré avec succès ",
                'data'=>''
            ]);
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"Quelque chose s'est mal passé lors de l'enregistrement. Veuillez  réessayer plus tard",
                'data'=>''                  
                
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
    
        
        
        $modif= DB::update('update produits set libelle = ?,
                                                groupe_produit_id = ?,
                                                prixAchatMin =?,
                                                prixAchatMax=?,
                                                prixVenteMin =?,
                                                prixVenteMax=?
                                                code =?,
                                                
                                                archived=?,
                                                 where id = ?', [$request->libelle,$request->categorie,$request->prixAchatMin,
                                                                 $request->PrixAchatMax,$request->prixVenteMin,$request->prixVenteMax,
                                                                 $request->code, $request->archived, $request->id]);
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
        $produit= new Produit();
        $produit = Produit::find($id);
        $produit->archived=false;

        $this->edit($produit->id);


    }
    public function deleteProducts(Request $request){
        $produits =Produit::where('archived',false);

        do
        {

        }while($produits);


    }

    public function getValidProduct(Request $request){
        $this->validator = Validator::make($request->all(), [
            'libelle' => 'required|unique:produits',
            'code' => 'required|unique:produits',
            'qteStock' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'qteSeuil' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',//decimal
            'prix_vente_min' => 'nullable|integer|not_in:0',         
            'prix_vente_max' => 'nullable|integer|not_in:0',         
            'prix_achat_min' => 'nullable|integer|not_in:0',         
            'prix_achat_max' => 'nullable|integer|not_in:0',     

        ],$messages=[
            'required'=>"Le champ ':attribute' doit être renseigné'",
            'unique'=>"Le champ ':attribute' existe déjà dans la base",
        ]);
      

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
               else if($request->prix_vente_max!=null && $request->prix_vente_min >= $request->prix_vente_max){
                    $this->validator->errors()->add('prix_vente_max','Le prix de vente maximal doit être supérieur au prix de vente Minimal');
              }
            }
            if($this->achatable){
                if($request->prix_achat_min==null){
                    $this->validator->errors()->add('prix_achat_min','Le prix d\'achat n\'est pas renseigné');
                }
               else if($request->prix_achat_max!=null && $request->prix_achat_min >= $request->prix_achat_max){
                $this->validator->errors()->add('prix_achat_max','Le prix d\'achat maximal doit être supérieur au prix d\'achat Minimal');
              }
            }
        });

       

        
    }
    

}
