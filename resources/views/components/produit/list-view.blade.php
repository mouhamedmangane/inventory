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
