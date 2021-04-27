<?php

namespace App\Http\Controllers\ParamCompte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BoutiqueUser;
use App\Util\HydrateFacade;
use App\Util\ImageFactory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DB,DataTables,Validator;

class UserController extends Controller
{

    public function getData(Request $request,$filter=""){
            $validator = Validator::make($request->all(),[
                'nom'=>'max:200',
                'all'=>'max:100',
                'filter'=>'max:100'
            ]);
            $users=User::select();
            switch($filter){
                case 'archiver': 
                    $users->where('archiver',1);
                    break;
                default : 
                    $users->where('archiver',0);
    
            }
    
            if($request->has('tous')){
                $users->where('name','like',$request->tous.'%');
            }
            
            $message="";
            $status="true";
            if($validator->fails()){
                $users=[];
                $message="Les données ne sont pas valides";
                $status=false;
            }
            else{
                $users=$users->get();
            }
    
        
        return DataTables::of($users)
                ->addColumn("boutiques",function($user){
                    return BoutiqueUser::where('user_id',$user->id)->where('activer',1)->distinct()->count().' boutiques (s)';
                })
                ->addColumn("nom",function($user){
                    return view('components.generic.links.simple')
                    ->with('src',asset("images/users/".$user->photo))
                    ->with('url',url("param-compte/users/".$user->id))
                    ->with('text',$user->name)
                    ->with('class','lien-sp');
                })
                ->addColumn("created_at_f",function($user){
                    return $user->created_at->format('d-m-Y H:i');
                })
                ->addColumn("updated_at_f",function($user){
                    return $user->updated_at->format('d-m-Y H:i');
                })
                ->rawColumns(['name','email','tel','boutiques','created_at_f','updated_at_f'])
                ->with('message',$message)
                ->with('status',$status)
                ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view("page.param-compte.user.liste",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User;
        return view("page.param-compte.user.create",compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response=$this->save($request,$this->memeValidationSave()+[
            "login"=>"required|max:100|unique:users,email",
            "pwd"=>"required|confirmed|max:100",
            ],
            ['name'=>'nom','email'=>'login','password'=>'pwd','ncni','tel'],
            'save'
        );
        
        return response()->json($response);
       
    }

    public function save(Request $request,Array $validationArray,$hydrateArray,$dataBaseMethod,$id=0){
         $validator = Validator::make($request->all()+['id'=>$id], $validationArray);
        if($validator->fails()){
            return \App\Http\ResponseAjax\Validation::validate($validator);
        }
        else{
            DB::beginTransaction();
            try {
                $user=new User;
                if($id>0){
                    $user=User::where('id',$id)->first();
                }
                HydrateFacade::make($user,$request,$hydrateArray);
                ImageFactory::store($request,$user,'photo','images/users',$user->id);
                if($request->filled('pwd')) {
                        $user->password=Hash::make($request->pwd);
                }
                if($user->$dataBaseMethod()){
                    $this->saveBoutiqueUsers($request->ba,$user->id);
                }
                DB::commit();
               
                return [
                    'status'=>true,
                    'message'=>'Enregistrement effectué avec success',
                    'id'=>$user->id
                ];
            } catch (\Throwable $th) {
                DB::rollback();
                
                return [
                    'status'=>false,
                    'message'=>__('messages.erreur_inconnu').' '.__('messages.operation_encore'),
                    'srr'=>dd($th)
                ];
            }
           
        }

    }

    public function memeValidationSave(){
        
        $tab=[
            "nom"=>"required|max:100",
            
            "ba"=>"array",
            "ba.*.boutique"=>"numeric|required_with:ba.*.role|exists:App\Models\Boutique,id",
            "ba.*.role.*"=>'numeric|exists:App\Models\Role,id',
            "ba.*.activer"=>"max:100",
            "image"=>"image",
            'ncni'=>'max:50',
            'tel' =>'max:20'
        ];
        return $tab;
    }

    public function saveBoutiqueUsers($bu_rqts,$user_id){
        foreach($bu_rqts as $bu_rqt){
            $bu =BoutiqueUser::where('user_id',$user_id)->where('boutique_id',$bu_rqt['boutique'])->first(); 
            if($bu){
                $bu->role_id = $bu_rqt['role'];
                $bu->activer = (isset($bu_rqt['activer']))? 1 : 0;
                $bu->update();
            }
            else{
                $bu= new BoutiqueUser;
                $bu->boutique_id = $bu_rqt['boutique'];
                $bu->user_id = $user_id;
                $bu->role_id = $bu_rqt['role'];
                $bu->activer= (isset($bu_rqt['activer']))? 1 : 0;
                $bu->save();
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
        $user= User::where('id',$id)->first();
        return view("page.param-compte.user.create",compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::where('id',$id);
        return view("page.param-compte.user.create",compact('user'));
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
        $request->input('id',$id);
        $response = $this->save($request,$this->memeValidationSave()+[
            "id"=>"required|numeric|exists:users,id",
            "pwd"=>"confirmed|max:100",
            "login"=>["required","max:100",Rule::unique('users', 'email')->ignore($id),],
            
            ],
            ['name'=>'nom','email'=>'login','password'=>'pwd/exist','ncni','tel'],
            'save',$id
        );
       
        return response()->json($response);
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

    public function archiver($id){
        return response()->json($this->abstractArchiver($id,1));
    }

    public function desarchiver($id){
        return response()->json($this->abstractArchiver($id,0));
    }

    public function archiverMany(Request $request){
        return response()->json($this->abstractArchiverMany($request,1));
    }

    public function desarchiverMany(Request $request){
        return response()->json($this->abstractArchiverMany($request,0));
    }

    private function abstractArchiver($id,$isAchived)
    {
        $validator=Validator::make(['id',$id],
        [
            'id'=>['numeric','exists:App\Models\User,id']
        ]);

        if($validator->fails()){
            return \App\Http\ResponseAjax\Validation::validate($validator);
        }
        else{
            return \App\Http\ResponseAjax\UpdateRow::manyForOnAttr('users',[$id],
            ['archiver'=>$isAchived],
            'messages.nbr_update');
        }  
    }
    
    private function abstractArchiverMany(Request $request,$isAchived){
        $validator=Validator::make($request->all(),
        [   
            'user_select'=>'array|required',
            'user_select.*'=>['numeric','exists:App\Models\User,id']
        ]);
        if($validator->fails()){
            return \App\Http\ResponseAjax\Validation::validate($validator);
        }
        else{
            return \App\Http\ResponseAjax\UpdateRow::manyForOnAttr('users',$request->user_select,
                                                                                            ['archiver'=>$isAchived],
                                                                                            'messages.nbr_update');
        }
    }

}
