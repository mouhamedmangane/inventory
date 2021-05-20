<?php

namespace App\Http\Controllers\Contact;

use App\Helpers\URLInventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Telephone;
use App\Util\HydrateFacade;
use App\Util\ImageFactory;

use Illuminate\Validation\Rule;
use App\Rules\DataBase\TelephoneRule;
use App\Rules\Ninterval;
use App\Rules\NOp;
use App\Rules\NSelect;
use DB,DataTables,Validator;

class ContactController extends Controller
{

    public function getData(Request $request,$boutique_id,$filter=""){
            $validator = Validator::make($request->all(),[
                'nom'=>'max:200',
                'type_client'=>[new NSelect()],
                'tel'=>[new NOp(NOp::NUMBER)],
                'email'=>[new NOp(NOp::TEXT)],
                'date_creation'=>[new Ninterval(Ninterval::DATE)],
                'all'=>'max:100',
                'filter'=>'max:100'
            ]);
            $contacts=Contact::select(DB::raw('distinct contacts.id,contacts.*'));
            $contacts->leftJoin('telephones', 'contacts.id', '=', 'telephones.contact_id');
            $contacts->where(function($query)use($filter){

                switch($filter){
                    case 'archiver':
                        $query->where('contacts.archiver',1);
                        break;
                    case 'client':
                            $query->where('contacts.is_client',1);
                            break;
                    case 'client_dette':
                            $query->where('contacts.is_client',1);
                            $query->where('contacts.compte','>',0);
                            break;
                    case 'client_credit':
                            $query->where('contacts.is_client',1);
                            $query->where('contacts.compte','<',0);
                            break;
                    case 'fournisseur':
                            $query->where('contacts.is_fournisseur',1);
                            break;
                    case 'fournisseur_dette':
                                $query->where('contacts.is_fournisseur',1);
                                $query->where('contacts.compte','>',0);
                                break;
                    case 'fournisseur_credit':
                                $query->where('contacts.is_fournisseur',1);
                                $query->where('contacts.compte','<',0);
                                break;
                    default :
                        $query->where('contacts.archiver',0);
                }
                if($filter!='archiver' && !empty($filter)){
                    $query->where('contacts.archiver',0);
                }
            });
            // filter telephone
            $contacts->where(function($query)use($request){
                \App\Util\NplFilter::one($query,$request,'tel','telephones.numero','number');
                \App\Util\NplFilter::one($query,$request,'tel','telephones.indicatif','number','orWhereRaw');

            });

            // filter mail
            \App\Util\NplFilter::one($contacts,$request,'email','contacts.email','text','Where');
            // filter fonction
            \App\Util\NplFilter::one($contacts,$request,'fonction','contacts.fonction','text','Where');

             //filter select type
            $contacts->where(function($query)use($request){
                \App\Util\NplFilter::select($query,$request,'type_contact',[
                    'client'=>['contacts.is_client','=','1'],
                    'fournisseur'=>['contacts.is_fournisseur','=','1'],
                ]);
            });

             //filter date creation
             $contacts->where(function($query)use($request){
                \App\Util\NplFilter::interval($query,$request,'date_creation','contacts.created_at','date');
            });

            if($request->has('tous') && !empty($request->tous)){
                $contacts->where('contacts.nom','like','%'.$request->tous.'%');
            }

            $message="";
            $status="true";
            if($validator->fails()){
                $contacts=[];
                $message="Les données ne sont pas valides";
                $status=false;
            }
            else{
                $contacts=$contacts->distinct('contacts.id')->get();
            }


        return DataTables::of($contacts)
                ->addColumn('fonctions',function($contact){
                    $attributes="";
                    $tab=['is_client'=>['client','badge-success'],'is_fournisseur'=>['fournisseur','badge-warning']];
                    foreach ($tab as $key => $value) {
                        if($contact->$key==1){
                            $attributes.= view('components.generic.bagde.badge')
                            ->with('text',$value[0])
                            ->with('class',''.$value[1]);
                        }
                    }
                    if(!empty($contact->fonction)){
                        $attributes.= view('components.generic.bagde.badge')
                            ->with('text',$contact->fonction)
                            ->with('class','badge-danger');
                    }
                    return $attributes;
                })
                ->addColumn('compte_f',function($contact){
                    if($contact->compte)
                        return number_format($contact->compte,0,'.',' ').' FCFA';
                    else
                        return 'Nulle';
                })
                ->addColumn("nom",function($contact){
                    return view('components.generic.links.simple')
                    ->with('src',asset("images/contacts/".$contact->photo))
                    ->with('url',URLInventory::wBurl("contact/".$contact->id))
                    ->with('text',$contact->nom)
                    ->with('class','lien-sp');
                })
                ->addColumn('tel',function($contact){
                    $telephones= Telephone::where('contact_id',$contact->id)->get();
                    $text="";
                    if(count($telephones)){
                        foreach ($telephones as $key => $value) {
                            if($value->numero){
                                if($key!=0){
                                    $text .=' / ';
                                }
                                $text .= \App\Util\NplStringFormat::telephone($value->numero.'',$value->indicatif.'');
                            }
                        }
                        return (!empty($text))?$text:'Aucun';
                    }
                    else{
                        return 'aucun';
                    }

                })
                ->addColumn("created_at_f",function($contact){
                    return $contact->created_at->format('d-m-Y H:i');
                })
                ->addColumn("updated_at_f",function($contact){
                    return $contact->updated_at->format('d-m-Y H:i');
                })
                ->addColumn("type",function($contact){
                    if($contact->is_client==1)
                        return 'Client';
                    if($contact->is_fournisseur==1)
                        return 'Fournisseur';
                    return 'Simple';
                })
                ->rawColumns(['nom','tel','compte','fonctions','created_at_f','updated_at_f','type'])
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
        return view("page.contact.liste",compact('contacts'));
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
            "nom"=>"required|max:100|unique:contacts,nom",
        ],
            ['nom','email','ncni','fonction'],
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


                if($request->has('client_fournisseur')){
                    $contact->is_client=(in_array('client',$request->client_fournisseur))?true:false;
                    $contact->is_fournisseur=(in_array('fournisseur',$request->client_fournisseur))?true:false;
                }

                ImageFactory::store($request,$contact,'photo','images/contacts',$contact->id);

                $contact->$dataBaseMethod();

                $this->saveTelephone($request,'tel1',$contact->id);
                if($request->has('tel2_numero') && !empty($request->tel2_numero.''))
                    $this->saveTelephone($request,'tel2',$contact->id);

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

    public function saveTelephone(Request $request,$attribute,$idContact){
        $telephone=new Telephone;
        $att=$attribute.'_id';
        if($request->has($att)){
            $telephone=Telephone::where('id',$request->$att)->first();
        }
        $telephone->contact_id=$idContact;


        $att=$attribute.'_indicatif';
        $telephone->indicatif=$request->$att;
        $att=$attribute.'_numero';
        $telephone->numero=$request->$att;

        $att=$attribute.'_id';
        if($request->has($att)){

            $telephone->update();
        }
        else{
            $telephone->save();
        }


        return $telephone;

    }


    public function memeValidationSave(){

        $tab=[

            "email"=>"email",
            "tel1.*"=>[new TelephoneRule()],
            "tel2"=>[new TelephoneRule()],
            "photo"=>"image",
            "fonction"=>"max:255",
            'ncni'=>'max:50',
            'client_fournisseur'=> 'array'
        ];
        return $tab;
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
        return view("page.contact.voir",compact('contact'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($boutiqueId,$id)
    {
        $contact= Contact::where('id',$id)->first();
        return view("page.contact.create",compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $boutiqueId,$id)
    {
        $request->request->add(['id'=>$id]);
        $response=$this->save($request,$this->memeValidationSave()+[
            'id'=>"required|exists:App\Models\Contact,id",
            'nom'=>['required',Rule::unique('contacts','nom')->ignore($id)]
        ],
            ['nom','email','ncni','fonction'],
            'update',$id
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

    public function destroyMany(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'contact_select'=>'array|required',
            'contact_select.*'=>['numeric','exists:App\Models\Role,id',
                              new \App\Rules\DbDependance('ventes','client_id',[['activer',1]])],
            'contact_select.*'=>['numeric','exists:App\Models\Role,id',
                              new \App\Rules\DbDependance('achats','fournisseur_id',[['activer',1]])]
        ]);

        if($validator->fails()){
            return response()->json(\App\Http\ResponseAjax\Validation::validate($validator));
        }
        else{
            return response()->json(\App\Http\ResponseAjax\DeleteRow::many('contacts',$request->contact_select));

        }
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
            ($isAchived)?'messages.nbr_archiver':'messages.nbr_desarchiver');
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
                                                                   ($isAchived)?'messages.nbr_archiver':'messages.nbr_desarchiver');
        }
    }

}
