@extends('layouts.ly')


@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px; background: rgba(0,0,0,.1);@if ($attributes['img'])border-color:black!important;@endif">
            @if ($attributes['img'])  {{--  ! --}}
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
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/produit/create'=>'Nouveau Produit Simple','/test2'=>'Nouveau Produit Composé']" />
    </div>
    
</div>
@endsection


@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
    <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
    <x-generic.navs-tabs.item text="Composants" idPane="composants" id="composants-tab"  />
</x-generic.navs-tabs.nav>
@endsection


@section('ly-main-content')
    <x-produit.new-product  />
@endsection



@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce