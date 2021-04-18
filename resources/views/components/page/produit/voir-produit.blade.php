
@extends('layouts.ly')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('plugin/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.bar >
        <x-generic.tool-bar.link id="nouveau_prod_tb" text="Nouveau" icon="add" url="/produit/new" evidence="btn-primary" />
        <x-generic.tool-bar.link id="modifier_prod_tb" text="Modifier" icon="edit" url="/produit/{{$produit->id}}/edit"   />
        {{-- <x-generic.tool-bar.button id="supprimer_prod_tb" text="Supprimer" icon="delete"  disabled="disabled" /> --}}
        <x-generic.tool-bar.divider/>
        <x-generic.tool-bar.button id="imprimer_prod_tb" text="Imprimer" icon="print"  />
        <x-generic.tool-bar.button id="archiver_prod_tb" text="Archiver" icon="archive"  />
        <x-generic.tool-bar.divider/>
        {{-- <x-generic.tool-bar.button id="ajuster_prod_tb" text="Ajuster" icon="archive"  /> --}}
        <x-generic.tool-bar.button id="rejet_prod_tb" text="Rejeter" icon="archive"  />



    </x-generic.tool-bar.bar>
@endsection



@section('ly-alert')
    <x-generic.alert.bar id='' />
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
         <x-generic.links.select-link contentCible="my-main" value="" :dt="['/produit/idproduit'=>'Détail Produit','/'=>'Mes Produits']" />
    </div>
    <div class="">
        <x-generic.infos.info-list>
            <x-generic.infos.info-item title="Ratio Vente" value="2 100/ Mois" icon="trending_down" />
            <x-generic.infos.info-item title="Ratio Vente" value="3 100 / Mois" icon="equalizer" />
            <x-generic.infos.info-item name="user" :title="$produit->done_by_user" :value='$produit->created_at' icon="save" typeIcon="material-icons-outlined" />

        </x-generic.infos.info-list>
    </div>

</div>
@endsection
@section('ly-main-content')
    <x-produit.voir-produit :produit='$produit' />
@endsection


@section('ly-main-bot')
    <div class="d-flex justify-content-between align-items-center  border">
        <div id='bas-left' class="ml-2">
        </div>
        <div id="bass-right" class="mr-2 d-flex">

        </div>
    </div>
@endsection
