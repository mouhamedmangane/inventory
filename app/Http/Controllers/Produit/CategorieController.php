<?php

namespace App\Http\Controllers\Produit;

use App\Http\Controllers\Controller;
use App\Models\GroupeProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responseaf
     */
    public function index()
    {
        $categories=GroupeProduit::all();
        return "ddd";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules["groupe_name"]= 'required|unique:groupe_produits';

        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails()) {
            return response()->json([
                "status"=>false,
                "message"=>"Invalide",
                'errors'=>$validator->errors(),
            ]);
        }
        else{
            $categorie= new GroupeProduit();

            $categorie->groupe_name=$request->groupe_name;
            if($categorie->save()){
                return response()->json([
                    "status"=>true,
                    "message"=>"Valide",
                    'errors'=>[],
                ]);
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
