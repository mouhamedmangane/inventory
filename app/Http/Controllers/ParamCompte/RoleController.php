<?php

namespace App\Http\Controllers\ParamCompte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        return view("page.param-compte.role.create-role");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[

            'id'=> 'numeric',
            'nom'=> 'required|max:100',
            
            'objet'=> 'array|required',
            'objet.*'=>'numeric',

            'c'=>'array',
            'r.'=>'array',
            'u.'=>'array',
            'd.'=>'array',

            'co.'=>'array',
            'ro.'=>'array',
            'uo.'=>'array',
            'do.'=>'array',
            
            'c.*'=>'numeric',
            'r.*'=>'numeric',
            'u.*'=>'numeric',
            'd.*'=>'numeric',

            'co.*'=>'numeric',
            'ro.*'=>'numeric',
            'uo.*'=>'numeric',
            'do.*'=>'numeric',
            
            
        ];
        $messages=[

        ];
        

        $validator = Validator::make($request->all(), $rules,$messages);

        $validator->after(function ($validator) use ($request){
            if(isset($srequest->id) && $request->id!=0 && Role::where('id', $request->id)->doesntExist()){
                $validator->errors()->add(
                    'id', 'l id du role n existe pas'
                );
            }
        });

        if($validator->fails()){
            return response()->json([
                "status"=>false,
                "message"=>"Certains valeurs du formulaire ne sont pas renseigné ou sont incorrects:",
                'errors'=>$validator->errors()
                ])  ;

        }else{
            DB::beginTransaction();
            $role = new Role;
            if(isset($request->id)  && $request->id!=0){
                $role->id=$request!=1;
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
