<<<<<<< HEAD
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @yield('input')


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="{{ URL::asset('plugin/bootstrap441/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugin/font/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/materialize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">

        
    
        
        <style>
            body {
                font-family: "Segoe UI", "Segoe UI Web (West European)", "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
            }
        </style>
        
    </head>
    
    <body > 
        @include('header')

        <div class="r-bar">

        </div>

        <div class="wrapper">
            <x-util.sidebar  />
            <div id="content" style="flex-grow: 1;">
                
                {{-- <div class="p-2">
                    <x-produit.list-view />
                    
                </div> --}}
                 
                <div style="height: 40px; background-color:beige; "> 
                    <div class="btn">
                        <a href="">
                        <span class="material-icons-outlined">
                            alarm_add
                            </span> Nouveau Produit
                        </a> 

                    
                    </div>
                </div>
                        
                            
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" name="" id=""></th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité Stock</th>
                        <th scope="col">Quantité Seuil</th>
                        <th scope="col">Unite Primaire</th>
                        <th scope="col">Prix Achat</th>
                        <th scope="col">Prix Vente</th>
                        <th scope="col">Catégorie</th>


                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    <tr>
                        <th scope="row"><input type="checkbox" name="" id=""></th>
                        <td>Produit A</td>
                        <td>25</td>
                        <td>10</td>
                        <td>sacs</td>
                        <td>1000FCFA</td>
                        <td>1500FCFA</td>
                        <td>Catégorie A</td>
                    </tr>
                    </tbody>
                </table>
                
  

            </div>
        </div>  
      

        





    </body>
</html>
=======
@extends('layouts.ly')


@section('header')
    <link rel="stylesheet" href="{{ URL::asset("plugin/DataTables/datatables.min.css") }}">  
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">  
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.barlist/>
@endsection



@section('ly-alert')
<div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection


@section('ly-title')
<div class="d-flex align-items-center justify-content-between pl-3 mt-1" >
    <div class="d-flex align-items-center my-2">
        {{-- <div  class="bg-primary text-white rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px;@if ($attributes['img'])border-color:black!important;@endif">
            @if ($attributes['img'])
                <img src="{{ asset("images/profig.jpg") }}"  
              width="43px"
              height="43px"
              class="rounded-circle" 
              style="">
            @else 
             <i class="material-icons md-18 ">assignment</i>
            @endif
            
        </div> --}}
         <x-generic.links.select-link contentCible="my-main" value="test1"  class="ml-2"
                                      :dt="['/test1'=>'Liste Produits','/test2'=>'Produit  Vendable']" />
        
    </div>
    <div class="col-md-5 d-flex aligns-items-center pr-2" >

        <div class="w-100 position-relative "  >
            <input type="text" class="form-control border" style="width: 100%;" placeholder="Rechercher">
            <i class="material-icons text-muted position-absolute" style="top:6px;right: 10px;color:#dee2e6;">search</i>
        </div>
    </div>
</div>
@endsection


@section('ly-main-content')
<div class=" pt-2">
    <x-generic.data-table.simple name="myDataTable" 
       url="{{ url('/produit/testDataTable')}}"
       :columns="[(object) ['name'=>'Prenom','propertyName'=>'prenom'], (object) ['name'=>'Nom','propertyName'=>'nom'],(object) ['name'=>'Age','propertyName'=>'age']]"
       idDivPaginate="bass-right"
       idDivInfo="bas-left"
       selectName="myDataTableSelect"
       pageLength="3" />
</div>
   
@endsection

@section('ly-main-bot')
<div class="d-flex justify-content-between align-items-center  border">
  <div id='bas-left' class="ml-2">
    
  </div> 
  <div id="bass-right" class="mr-2 d-flex">

  </div>
</div>
   
@endsection

>>>>>>> 786f364d19d753277e59f32a2b56219eae44eb60
