@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.bar/>
@endsection


@section('ly-alert')
<div class="" id="addVenteAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection

@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
             style="width: 43px; height: 43px; background: rgba(0,0,0,.1);"{{--@if ($attributes['img'])border-color:black!important;@endif"--}}> 
           {{-- @if ($attributes['img'])    ! --}}
           @if(false)
                <img src="{{ asset("images/profig.jpg") }}"  
                    width="43px"
                    height="43px"
                    class="rounded-circle" 
                    style=""
                >
            @else 
             <i class="material-icons">add_shopping_cart</i>
            @endif            
        </div>
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/vente/new'=>'Nouvelle Vente','/test2'=>'Nouveau Produit Composé']" />
    </div>
    
</div>
@endsection


@section('ly-main-content')
    <x-vente.nouveau/>
@endsection

@section('ly-main-bot')
    dfmlsdfdfjdldjsflk
@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce