@extends('layouts.ly-list')

@section('ly-toolbar')
    <x-generic.tool-bar.bar >
        <x-generic.tool-bar.link id="nouveau_prod_tb" text="Nouveau" icon="add" url="/vente/new" evidence="btn-primary" />
        <x-generic.tool-bar.button id="modifier_prod_tb" text="Modifier" icon="edit" disabled="disabled" />
        <x-generic.tool-bar.button id="supprimer_prod_tb" text="Supprimer" icon="delete"  disabled="disabled" />
        <x-generic.tool-bar.divider/>
        <x-generic.tool-bar.button id="imprimer_prod_tb" text="Imprimer" icon="print"  />
        <x-generic.tool-bar.button id="archiver_prod_tb" text="Archiver" icon="archive" disabled="disabled" />
        <x-generic.tool-bar.button id="favoris_prod_tb" text="Favoris" icon="grade"  disabled="disabled" />
        <x-generic.data-table.group-by-btn id="groupby_prod_tb"  label="Grouper Par" idDataTable="myDataTable"
                                           :dt="['categore'=>'Catégorie','stock'=>'Situation Stock']" defaultSelected=''  />


    </x-generic.tool-bar.bar>
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
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/test1'=>'Mes Ventes']" />
    </div>

</div>
@endsection


@section('ly-main-content')
    <x-vente.util.liste />
@endsection

@section('ly-main-bot')

        <div class="d-flex justify-content-between align-items-center  border">
            <div id='bas-left' class="ml-2">
            </div>
            <div id="bass-right" class="mr-2 d-flex">

            </div>
        </div>


@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce
