<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        dd($request->ip());

        $validations= $request->validate([
            'libelle'=> 'required|unique:posts|max:250'
            
        ]);
        
        return view('welcome');
    
    }
}
