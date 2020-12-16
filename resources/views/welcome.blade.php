<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <link rel="stylesheet" href="{{ URL::asset('plugin/bootstrap441/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugin/font/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/materialize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">

        
    
        
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        
    </head>
    <body >
        
        @include('header')

        <div class="wrapper">

            @php
                $navModel = App\ViewModel\Navs\NavModelFactory::navModel()
                    ->addNavBlocModel(
                        App\ViewModel\Navs\NavModelFactory::navBlocModel()
                        ->addNavItemModel("Dashbord","/ ","home")
                        ->addNavItemModel("Contact","/dashbord","account_box ")
                        ->addNavGroupModel(App\ViewModel\Navs\NavModelFactory::navGroupModel("Produit Groupe","home")
                            ->addNavItemModel("Ajustement","/dashbord")
                            ->addNavItemModel("Rebut","/dashbord")
                        )

                    )
                    ->addNavBlocModel(
                        App\ViewModel\Navs\NavModelFactory::navBlocModel()
                        ->addNavItemModel("Vente","/dashbord","shopping_cart")
                        ->addNavItemModel("Achat","/dashbord","receipt")
                        ->addNavItemModel("Depense","/dashbord","remove_shopping_cart")
                        
                    ) 
                    ->addNavBlocModel(
                        App\ViewModel\Navs\NavModelFactory::navBlocModel()
                        ->addNavItemModel("Integration","/Integration","integration_instructions")
                        ->addNavItemModel("Rapport","/dashbord","flag")
                    ) 
                    ;
            @endphp
            <x-sidebar.nav :navModel="$navModel" class="bg-green"/>
           
            <div id="content">


            </div>
        
        </div>  
        




        
        <script src="{{ URL::asset('dist/js/jquery.js') }}"></script>
    </body>
</html>
