<?php

use App\Http\Controllers\AjustementController;
use App\Http\Controllers\ProduitController;
use App\Models\Ajustement;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Rules\Ninterval;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('page.dashbord.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Produit

Route::get('produit/create', [ProduitController::class, 'create']);

Route::get('produit/produit', function () {
    return view('page.produit.create');
});

Route::get('produits/ajustements/create',[AjustementController::class,'create' ]);

Route::get('produit/list', function () {
    return view('page.produit.list');
});
Route::post('produit/save',[ProduitController::class,'store'])->name('produit.save');

Route::get('produit/data', [ProduitController::class, 'getData']);

Route::post('produit/test', function(Request $request){

    return response()->json([

            "status"=>true,
            "message"=>"Saisie Incorrent veillee mettre des donnees valide",
            'errors'=>[
                ['name'=> 'nom','message'=>'ce invalide'],
                ['name'=> 'reference','message'=>'ce invalide'],
                ['name'=> 'type','message'=>'ce invalide'],
            
        ]
    ]);
});

// test datatable



require __DIR__.'/auth.php';
