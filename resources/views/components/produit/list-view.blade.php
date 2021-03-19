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
    <div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection


@section('ly-title')
    <div class="d-flex align-items-center justify-content-between pl-3 mt-1 w-100 flex-wrap-sm" style="overflow-x: hidden;">
        <div class="d-flex align-items-center my-2 n-col-sm-12">
            <div  class="bg-primary text-white rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
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
            
        </div>
            <x-generic.links.select-link contentCible="my-main" value="test1" class="mx-2" 
                :dt="['/produit/data/'=>'Mes Produits','/produit/list/non_archived'=>'Produit Composés','/produit/list/archived'=>'Produits Archivés','/test2'=>'Produit  Vendable']" />

     </div>
        <div class="flex-grow-1 d-flex aligns-items-center pr-2 justify-content-end w-100 " style="overflow-x: hidden;">
            <x-generic.filters.search-filter id="mySearch" name="all" dataTableId='myDataTable' />
        </div>
    </div>
@endsection


@section('ly-main-content')
    
        <x-generic.data-table.simple 
            class="ly-list-table table-fixed"
            scrollY="100"
            name="myDataTable" url="{{ url('/produit/data/') }}" :columns="$columns()"
            idDivPaginate="bass-right" idDivInfo="bas-left" pageLength="10"
            selectName="myDataTableSelect" searchId='mySearch'
            pageLength="25"
            idAlert="addProduitAlert"
            groupByEnable="true"
            {{-- groupBy="categorie" --}}
            :actions="[
                ['op'=>'Suppression','id'=>'supprimer_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true,'typeAlert'=>'modal'],
                ['op'=>'Archivage','id'=>'archiver_prod_tb','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Favoris','id'=>'favoris_btn_id','url'=>'/testRemove','type'=>'action','canSelect'=>'*','confirm'=>true],
                ['op'=>'Modifier','id'=>'modifier_prod_tb','url'=>'/produit','type'=>'link','canSelect'=>'1'],
            ]"
            />
 

@endsection

@section('ly-main-bot')
    <div class="d-flex justify-content-between align-items-center  border">
        <div id='bas-left' class="ml-2">
        </div>
        <div id="bass-right" class="mr-2 d-flex">

        </div>
    </div>

@endsection
