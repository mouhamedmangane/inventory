<?php

use App\Http\Controllers\AjustementController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
use App\Models\Ajustement;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Rules\Ninterval;
use Illuminate\Contracts\Validation\Validator;

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

Route::get('produit', [ProduitController::class,'index']);
Route::post('produit/save',[ProduitController::class,'store'])->name('produit.save');

Route::get('produit/data/', [ProduitController::class, 'returnData']);
Route::post('produit/newProd', function(){
    return view('components.produit.new-product');
});

Route::get('produit/{id}/update', [ProduitController::class,'update']);


// test datatable
Route::get('produit/testDataTable', function(Request $request){
    $messages="";
    $data_validation= Validator::make($request->all(),[
        'prix'=>[new Ninterval(Ninterval::NUMBER) ]
    ]);
    if($data_validation->fails()){
        $messages = $data_validation->messages();
    }
    return response()->json([

            "status"=>true,
            "message"=> "Saisie Incorrent veillee mettre des donnees valide",
            "validation"=> $messages,
            "request"=>$request->all(),
            'data'=>[
                (object)['id'=> 1,'prenom'=> 'boubou','nom'=>'ce invalide','age'=>15],
                (object)['id'=> 2,'prenom'=> 'boubou','nom'=>'Livre','age'=>41],
                (object)['id'=> 6,'prenom'=> 'asee','nom'=>'Livre','age'=>441],
                (object)['id'=> 3,'prenom'=> 'boubou','nom'=>'koro','age'=>78],
                (object)['id'=> 4,'prenom'=> 'boubou','nom'=>'TeBA','age'=>45]
            
        ]
    ]);
});

//Editor Table by Noppal
Route::get('/editorTable', function(Request $request){
    return view('page.test.editor');
});

Route::get('produit/categorie/{id}',[ProduitController::class,'getProducts']);
Route::get('produit/unite/{id}',[ProduitController::class,'getUnit']);
Route::get('produit/modif/{id}',[ProduitController::class,'update']);

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




Route::post('vente/save',  [VenteController::class,'store']);
Route::get('vente/new',[VenteController::class,'create']);
Route::get('vente/data',[VenteController::class,'returnVentes']);
Route::get('ventes/{date?}', [VenteController::class,'index']);

Route::get('venteProduit/categorie/{id}',[VenteController::class,'getProducts']);

require __DIR__.'/auth.php';
