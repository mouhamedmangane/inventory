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

Route::get('produit/list/{data}', [ProduitController::class,'index']);
Route::post('produit/save',[ProduitController::class,'store'])->name('produit.save');

Route::get('produit/data', [ProduitController::class, 'returnData']);
Route::post('produit/newProd', function(){
    return view('components.produit.new-product');
});


// test datatable



require __DIR__.'/auth.php';
