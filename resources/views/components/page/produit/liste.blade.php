@extends('layouts.ly-list')


@section('header')
    <link rel="stylesheet" href="{{ URL::asset('plugin/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.bar >
        <x-generic.tool-bar.link id="nouveau_prod_tb" text="Nouveau" icon="add" url="/produit/new" evidence="btn-primary" />
        <x-generic.tool-bar.button id="modifier_prod_tb" text="Modifier" icon="edit"  disabled="disabled" />
        <x-generic.tool-bar.button id="supprimer_prod_tb" text="Supprimer" icon="delete"  disabled="disabled" />
        <x-generic.tool-bar.divider/>
        <x-generic.tool-bar.button id="imprimer_prod_tb" text="Imprimer" icon="print"  />
        <x-generic.tool-bar.button id="archiver_prod_tb" text="Archiver" icon="archive" disabled="disabled" />
        <x-generic.tool-bar.button id="favoris_prod_tb" text="Favoris" icon="grade"  disabled="disabled" />
        <x-generic.filters.filter :filter="$getFilter()"/>
        <x-generic.data-table.group-by-btn id="groupby_prod_tb"  label="Grouper Par" idDataTable="myDataTable"
                                           :dt="['categorie'=>'categorie','fournisseur'=>'Fournisseur']" defaultSelected=''  />
    </x-generic.tool-bar.bar>
@endsection



@section('ly-alert')
    <x-generic.alert.bar id='addProduitAlert' />
@endsection


@section('ly-title')
    <x-generic.title-bar.bar>
        <x-slot name="image">
            <x-generic.icon.simple name="assignment" taille="16" />
        </x-slot>
<<<<<<< HEAD
        <x-generic.links.select-link contentCible="my-main" value="test1" class="mx-2" 
=======
        <x-generic.links.select-link contentCible="my-main" value="test1" class="mx-2"
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
            :dt="['/produit/data/'=>'Mes Produits','/produit/list/non_archived'=>'Produit Composés','/produit/list/archived'=>'Produits Archivés','/test2'=>'Produit  Vendable']" />

        <x-slot name="right">
            <x-generic.filters.search-filter id="mySearch" name="all" dataTableId='myDataTable' />
        </x-slot>
    </x-generic.title-bar.bar>
@endsection


@section('ly-main-content')
<<<<<<< HEAD
    
=======

>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455


@section('ly-main-content')
    <x-produit.list-view />
@endsection

@endsection

@section('ly-main-bot')
    <div class="d-flex justify-content-between align-items-center  border">
        <div id='bas-left' class="ml-2">
        </div>
        <div id="bass-right" class="mr-2 d-flex">

        </div>
    </div>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3d9119e184b9abe2f3cc882c372b2137e868f455
