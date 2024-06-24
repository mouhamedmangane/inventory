<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Produit\AjustementController;
use App\Http\Controllers\Produit\ProduitController;
use App\Http\Controllers\Vente\VenteController;
use App\Http\Controllers\ParamCompte\UserController as PCUserController;
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


require __DIR__.'/auth.php';

Route::get('toggle_sidebar',function(Request $request){
    $validator=Validator::make($request->all(),[
        'active'=>'string|required'
    ]);
    if(!$validator->fails()){
        session(['toggle_sidebar'=>$request->active]);

    }
    return response()->json(['status'=>true]);

});

Route::middleware([])->prefix('b/{urlBoutiqueId}')->group(function () {


    Route::get('produit/new', [ProduitController::class, 'create']);
    Route::get('produit/produit', function () {
        return view('page.produit.create');
    });
    Route::get('produit', [ProduitController::class,'index']);
    Route::post('produit/save',[ProduitController::class,'store'])->name('produit.save');
    Route::get('produit/data/', [ProduitController::class, 'returnData']);
    Route::post('produit/newProd', function(){
        return view('components.produit.new-product');
    });
    Route::get('produit/{id}/update', [ProduitController::class,'update']);
    Route::get('produit/categorie/{id}',[ProduitController::class,'getProducts']);
    Route::get('produit/unite/{id}',[ProduitController::class,'getUnit']);
    Route::get('produit/modif/{id}',[ProduitController::class,'update']);

    // Ajustement
    Route::get('produit/ajustements/create',[AjustementController::class,'create' ]);

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

    // Contact
    Route::get('contact/data',[ContactController::class,'getData']);
    Route::get('contact/data/{filter}',[ContactController::class,'getData']);
    Route::get('contact/archiver/{id}',[ContactController::class,'archiver']);
    Route::get('contact/desarchiver/{id}',[ContactController::class,'desarchiver']);
    Route::get('contact/archiverMany',[ContactController::class,'archiverMany']);
    Route::get('contact/desarchiverMany',[ContactController::class,'desarchiverMany']);
    Route::resources(['contact'=>ContactController::class]);

    //Vente
    Route::post('vente/save',  [VenteController::class,'store']);
    Route::get('vente/new',[VenteController::class,'create']);
    Route::get('vente/data',[VenteController::class,'returnVentes']);
    Route::get('vente/{date?}', [VenteController::class,'index']);
    Route::get('vente/view/{id}', [VenteController::class,'show']);
    Route::get('venteProduit/categorie/{id}',[VenteController::class,'getProducts']);
});
Route::middleware([])->group(function () {

    Route::get('/', [HomeController::class,'index']);


    //Changer profil
    Route::get('photo_form',[ProfilController::class,'photoForm']);
    Route::post('photo_save',[ProfilController::class,'savephoto']);
    Route::get('profil_form',[ProfilController::class,'profilForm']);
    Route::post('profil_save',[ProfilController::class,'profilSave']);


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Home
    Route::get('/home',[HomeController::class,'index']);

    // Produit


});

// Group Admin
Route::middleware([])->group(function () {

    // User
    Route::get('param-compte/users/data',[PCUserController::class,'getData']);
    Route::get('param-compte/users/data/{filter}',[PCUserController::class,'getData']);
    Route::get('param-compte/users/archiver/{id}',[PCUserController::class,'archiver']);
    Route::get('param-compte/users/desarchiver/{id}',[PCUserController::class,'desarchiver']);
    Route::get('param-compte/users/archiverMany',[PCUserController::class,'archiverMany']);
    Route::get('param-compte/users/desarchiverMany',[PCUserController::class,'desarchiverMany']);
    Route::resources(['param-compte/users'=>PCUserController::class]);

    // Role
    Route::get('param-compte/roles/data',[App\Http\Controllers\ParamCompte\RoleController::class,'getData']);
    Route::get('param-compte/roles/data/{filter}',[App\Http\Controllers\ParamCompte\RoleController::class,'getData']);
    Route::put('param-compte/roles/archiver',[App\Http\Controllers\ParamCompte\RoleController::class,'archiver']);
    Route::delete('param-compte/roles',[App\Http\Controllers\ParamCompte\RoleController::class,'destroyMany']);
    Route::resources(['param-compte/roles'=>App\Http\Controllers\ParamCompte\RoleController::class]);

});
