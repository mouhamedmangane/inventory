<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Crontollers\NewProductController;
use Illuminate\Http\Request;

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
Route::get('produit/produit', function ($id) {
    
});


Route::get('produit/list', function () {
    return view('page.produit.list');
});

Route::get('/newProduct', [NewProductController::class]);

Route::post('produit/test', function(Request $request){

    return response()->json([

            "status"=>false,
            "message"=>"Saisie Incorrent veillee mettre des donnees valide",
            'errors'=>[
                ['name'=> 'nom','message'=>'ce invalide'],
                ['name'=> 'reference','message'=>'ce invalide'],
                ['name'=> 'type','message'=>'ce invalide'],
            
        ]
    ]);
});

// test datatable
Route::get('produit/testDataTable', function(Request $request){

    return response()->json([

            "status"=>true,
            "message"=>"Saisie Incorrent veillee mettre des donnees valide",
            'data'=>[
                (object)['prenom'=> 'boubou','nom'=>'ce invalide','age'=>15],
                (object)['prenom'=> 'boubou','nom'=>'Livre','age'=>41],
                (object)['prenom'=> 'boubou','nom'=>'koro','age'=>78],
                (object)['prenom'=> 'boubou','nom'=>'TeBA','age'=>45]
            
        ]
    ]);
});



require __DIR__.'/auth.php';
