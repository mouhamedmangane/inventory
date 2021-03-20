@extends('layouts.ly')
@section('ly-toolbar')
    <x-generic.tool-bar.barlist/>
@endsection
@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div  class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px; background: rgba(0,0,0,.1);@if ($attributes['img'])border-color:black!important;@endif">
            @if ($attributes['img'])
                <img src="{{ asset("images/profig.jpg") }}"  
              width="43px"
              height="43px"
              class="rounded-circle" 
              style="">
            @else 
             <i class="material-icons">add_shopping_cart</i>
            @endif
            
        </div>
         <x-generic.links.select-link contentCible="my-main" value="/vente/allventes" :dt="['vente/'=>'Ventes','/vente/allventes'=>'Ventes / N° :']" />
            {{$vente->numeroVente}}
    </div>
    <div class="">
        <x-generic.infos.info-list>
            <x-generic.infos.info-item title="Somme à payer" value="{{$vente->montantTotal - $vente->ligne_payement_ventes->sum('montant')}} FCFA" icon="payments" typeIcon="material-icons-outlined" />
            <x-generic.infos.info-item title="Montant Total" value="{{$vente->montantTotal}} FCFA" icon="equalizer" />
            @if($vente->complet)
                 <x-generic.infos.info-item title="Statut Vente" value="COMPLETE" icon="assignment_turned_in" couleur="success" />
            @elseif(!$vente->payement_complet()){{--  ou livraison incomplete --}}
                 <x-generic.infos.info-item title="Statut Vente" value="INCOMPLETE" icon="assignment_turned_in" couleur="warning" /> 
            @else
                 <x-generic.infos.info-item title="Statut Vente" value="Incomplete" icon="assignment_turned_in" couleur="danger" />
            @endif
               
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
    <x-vente.voir-vente :vente=$vente/>
@endsection

@section('ly-main-bot')
       <div class="col-md-6">
             {{$vente->ligne_ventes->count()}} Variante(s) de produit achetée(s)
             @if($vente->notes)
                <div>
                   <u>Notes * </u> : {{$vente->notes}}
                </div>
             @endif
            
       </div>
@endsection

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce