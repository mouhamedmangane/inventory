@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.barlist/>
@endsection
@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div  class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px; background: rgba(0,0,0,.1);@if ($attributes['img'])border-color:black!important;@endif">
            @if (!$attributes['img'])
                <img src="{{ asset("images/profig.jpg") }}"  
              width="43px"
              height="43px"
              class="rounded-circle" 
              style="">
            @else 
             <i class="material-icons">add_shopping_cart</i>
            @endif
            
        </div>
         <x-generic.links.select-link contentCible="my-main" value="/test2/e" :dt="['/test2/e'=>'Mouhamed Mangane','/test2/r'=>'linkB']" />
        
    </div>
    <div class="">
        <x-generic.infos.info-list>
            <x-generic.infos.info-item title="Numero Vente" value="V001C0" icon="add_shopping_cart" />
            <x-generic.infos.info-item title="Montant Total" value="24 500 FCFA" icon="equalizer" />
            <x-generic.infos.info-item title="Montant Restant" value="5 500 FCFA" icon="equalizer" />
        </x-generic.infos.info-list>
    </div>
</div>
@endsection

@section('ly-alert')
<div class="" id="addVenteAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection

@section('ly-title')

@endsection


@section('ly-main-content')
    <x-vente.voir-vente vente=$vente/>
@endsection

@section('ly-main-bot')
        Date et Heure de la vente: 21/02/2021 à 12h:54
@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce