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

Route::get('produit/ajustements/create',[AjustementController::class,'create' ]);

Route::get('produit/list/', [ProduitController::class,'index']);
Route::post('produit/save',[ProduitController::class,'store'])->name('produit.save');

Route::get('produit/data/', [ProduitController::class, 'returnData']);
Route::post('produit/newProd', function(){
    return view('components.produit.new-product');
});

Route::get('produit/{id}/update', [ProduitController::class,'update']);


// test datatable

//Editor Table by Noppal
Route::get('/editorTable', function(Request $request){
    return view('page.test.editor');
});
Route::get('categorie/{id}',[Produit]);

Route::get('/test/categorie/{id}', function(Request $request){
    $json=[];
    $json['status']=true;
    $json['data']=[
        (object)['value'=>'11','text'=>'onze'],
        (object)['value'=>'12','text'=>'douze'],
        (object)['value'=>'13','text'=>'treize'],
        (object)['value'=>'14','text'=>'quate']
    ];
    return response()->json($json);
});

Route::get('/test2/{type}', function(Request $request,$type){
    if($type=='r'){
        return 'salut';
    }
    return 'bonjour';
});



require __DIR__.'/auth.php';
