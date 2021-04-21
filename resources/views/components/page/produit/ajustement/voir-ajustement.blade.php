
@extends('layouts.ly-list')

@section('header')
    <link rel="stylesheet" href="{{ URL::asset('plugin/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugin\DataTables\RowGroup-1.1.2\css\rowGroup.bootstrap4.min.css') }}">
@endsection


@section('ly-toolbar')
    <x-generic.tool-bar.bar >

        <x-generic.tool-bar.prev-button id="prev_tb"  url="/produit/ajustement"  />

        <x-generic.tool-bar.link id="nouveau_prod_tb" text="Nouveau" icon="add" :url="url('produit/ajustement/new')" evidence="btn-primary" />
        <x-generic.tool-bar.button id="modifier_prod_tb" text="Modifier" icon="edit"  disabled="disabled" />
        <x-generic.tool-bar.button id="supprimer_prod_tb" text="Supprimer" icon="delete"  disabled="disabled" />
        <x-generic.tool-bar.divider/>
        <x-generic.tool-bar.button id="imprimer_prod_tb" text="Imprimer" icon="print"  />
        <x-generic.data-table.group-by-btn id="groupby_prod_tb"  label="Grouper Par" idDataTable="myDataTable"
                                           :dt="['date'=>'Date d\'ajustement','produit'=>'Produit Ajusté']" defaultSelected=''  />
    </x-generic.tool-bar.bar>
@endsection


@section('ly-alert')
    <div class="" id="" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection
@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div class="rounded-circle border  text-align center d-flex align-items-center justify-content-center"
             style="width: 43px; height: 43px; background: rgba(0,0,0,.1);"
             {{--@if ($attributes['img'])border-color:black!important;@endif"--}}>
           {{-- @if ($attributes['img'])    ! --}}
           @if(false)
                <img src="{{ asset("images/profig.jpg") }}"
                    width="43px"
                    height="43px"
                    class="rounded-circle"
                    style=""
                >
            @else
             <i class="material-icons">adjust</i>
            @endif
        </div>
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/produit/newProd'=>'Ajustements/DateAjustement','/test2'=>'Nouveau Produit Composé']" />
    </div>
    <div class="">
        <x-generic.infos.info-list>
            <x-generic.infos.info-item title="Enregistré le" :value="$ajustement->created_at" icon="save" />
            <x-generic.infos.info-item title="produit(s) ajusté(s)" :value="$ajustement->ligne_ajustements->count('ajuste',true)" icon="save" />

        </x-generic.infos.info-list>
    </div>


</div>
@endsection



@section('ly-main-content')
    <x-produit.ajustement.voir_ajustement :ajus="$ajustement"/>
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
