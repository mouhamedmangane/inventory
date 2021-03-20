<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @yield('header')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ URL::asset('plugin/font/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/materialize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugin/bootstrap441/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/components.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('dist/css/style.css') }}">
        <style>
            body {
                font-family: "Segoe UI", "Segoe UI Web (West European)", "Segoe UI", -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", sans-serif;
            }
        </style>
    </head>
    
    <body>
        <x-util.header/>
        <div class="r-bar"></div>
        
        <div class="wrapper">
            <x-util.sidebar  />
            <div id="content" class="position-relative" style="flex-grow: 1;">
                @yield('content')           
            </div>
        </div>  



        <script src="{{ URL::asset('dist/js/jquery.js') }}"></script>
        <script src="{{ URL::asset('dist/js/popper.js') }}"></script>
        <script src="{{ URL::asset('plugin/bootstrap441/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ URL::asset('dist/js/components.js') }}"></script>
        @stack('script')
            
    </body>
</html>
