<?php

use Illuminate\Support\Facades\Route;
use App\Http\Crontollers\NewProductController;
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
Route::get('produit/create', function () {
    return view('page.produit.create');
});
Route::get('produit/list', function () {
    return view('page.produit.list');
});

Route::get('/newProduct', [NewProductController::class]);

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
                (object)['prenom'=> 'boubou','nom'=>'ce invalide','age'=>15],
                (object)['prenom'=> 'boubou','nom'=>'Livre','age'=>41],
                (object)['prenom'=> 'boubou','nom'=>'koro','age'=>78],
                (object)['prenom'=> 'boubou','nom'=>'TeBA','age'=>45]
            
        ]
    ]);
});

//Editor Table by Noppal
Route::get('/editorTable', function(Request $request){
    return view('page.test.editor');
});
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




require __DIR__.'/auth.php';
