<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\BoutiqueContact;
use App\Util\HydrateFacade;
use App\Util\ImageFactory;
use Illuminate\Validation\Rule;
use App\Rule\DataBase\TelephoneRule;
use Illuminate\Support\Facades\Hash;
use DB,DataTables,Validator;

class ContactController extends Controller
{

    public function getData(Request $request,$filter=""){
            $validator = Validator::make($request->all(),[
                'nom'=>'max:200',
                'all'=>'max:100',
                'filter'=>'max:100'
            ]);
            $contacts=Contact::select();
            switch($filter){
                case 'archiver': 
                    $contacts->where('archiver',1);
                    break;
                default : 
                    $contacts->where('archiver',0);
    
            }
    
            if($request->has('tous')){
                $contacts->where('name','like',$request->tous.'%');
            }
            
            $message="";
            $status="true";
            if($validator->fails()){
                $contacts=[];
                $message="Les données ne sont pas valides";
                $status=false;
            }
            else{
                $contacts=$contacts->get();
            }
    
        
        return DataTables::of($contacts)
                ->addColumn("nom",function($contact){
                    return view('components.generic.links.simple')
                    ->with('src',asset("images/contacts/".$contact->photo))
                    ->with('url',url("param-compte/contacts/".$contact->id))
                    ->with('text',$contact->name)
                    ->with('class','lien-sp');
                })
                ->addColumn("created_at_f",function($contact){
                    return $contact->created_at->format('d-m-Y H:i');
                })
                ->addColumn("updated_at_f",function($contact){
                    return $contact->updated_at->format('d-m-Y H:i');
                })
                ->rawColumns(['nom','tel','tel','created_at_f','updated_at_f'])
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
        $contacts=Contact::all();
        return view("contact.liste",compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact=new Contact;
        return view("page.contact.create",compact('contact'));
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
            "login"=>"required|max:100|unique:contacts,email",
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
                $contact=new Contact;
                if($id>0){
                    $contact=Contact::where('id',$id)->first();
                }
                HydrateFacade::make($contact,$request,$hydrateArray);
                ImageFactory::store($request,$contact,'photo','images/contacts',$contact->id);
                if($request->filled('pwd')) {
                        $contact->password=Hash::make($request->pwd);
                }
                if($contact->$dataBaseMethod()){
                    $this->saveBoutiqueContacts($request->ba,$contact->id);
                }
                DB::commit();
               
                return [
                    'status'=>true,
                    'message'=>'Enregistrement effectué avec success',
                    'id'=>$contact->id
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
            "email"=>"array",
            "tel1"=>[new TelephoneRule()],
            "tel2.indicatif"=>"numeric",
            "tel2"=>'numeric|exists:App\Models\Role,id',
            "photo"=>"image",
            'ncni'=>'max:50',
        ];
        return $tab;
    }

    public function saveBoutiqueContacts($bu_rqts,$contact_id){
        foreach($bu_rqts as $bu_rqt){
            $bu =BoutiqueContact::where('contact_id',$contact_id)->where('boutique_id',$bu_rqt['boutique'])->first(); 
            if($bu){
                $bu->role_id = $bu_rqt['role'];
                $bu->activer = (isset($bu_rqt['activer']))? 1 : 0;
                $bu->update();
            }
            else{
                $bu= new BoutiqueContact;
                $bu->boutique_id = $bu_rqt['boutique'];
                $bu->contact_id = $contact_id;
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
        $contact= Contact::where('id',$id)->first();
        return view("contact.create",compact('contact'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact= Contact::where('id',$id);
        return view("contact.create",compact('contact'));
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
            "id"=>"required|numeric|exists:contacts,id",
            "pwd"=>"confirmed|max:100",
            "login"=>["required","max:100",Rule::unique('contacts', 'email')->ignore($id),],
            
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
            'id'=>['numeric','exists:App\Models\Contact,id']
        ]);

        if($validator->fails()){
            return \App\Http\ResponseAjax\Validation::validate($validator);
        }
        else{
            return \App\Http\ResponseAjax\UpdateRow::manyForOnAttr('contacts',[$id],
            ['archiver'=>$isAchived],
            'messages.nbr_update');
        }  
    }
    
    private function abstractArchiverMany(Request $request,$isAchived){
        $validator=Validator::make($request->all(),
        [   
            'contact_select'=>'array|required',
            'contact_select.*'=>['numeric','exists:App\Models\Contact,id']
        ]);
        if($validator->fails()){
            return \App\Http\ResponseAjax\Validation::validate($validator);
        }
        else{
            return \App\Http\ResponseAjax\UpdateRow::manyForOnAttr('contacts',$request->contact_select,
                                                                                            ['archiver'=>$isAchived],
                                                                                            'messages.nbr_update');
        }
    }

}
