<?php

namespace App\Http\Controllers;
use App\Models\BoutiqueUser;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    

    public function index(){
        $user=Auth::user();
        $boutiques= $user->boutiques()->where('activer',1)->get();

        return view('page.home',compact('boutiques','user'));
    }
}
