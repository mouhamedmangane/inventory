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
                <x-produit.nouveau />
                                    
            </div>
        </div>  
        

        <script src="{{ URL::asset('dist/js/jquery.js') }}"></script>
        <script src="{{ URL::asset('dist/js/popper.js') }}"></script>
        <script src="{{ URL::asset('plugin/bootstrap441/js/bootstrap.bundle.js') }}"></script>
        @stack('script')
            
    </body>
</html>
