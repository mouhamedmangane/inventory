@extends('layouts.ly')

@section('ly-toolbar')
    <x-generic.tool-bar.bar/>
@endsection

@section('ly-alert')
<div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
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
         <x-generic.links.select-link contentCible="my-main" value="test1" :dt="['/produit/create'=>'Nouveau Produit Simple','/test2'=>'Nouveau Produit Composé']" />
        
    </div>
    
</div>
@endsection


@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="  px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
    <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
</x-generic.navs-tabs.nav>
@endsection


@section('ly-main-content')
<form action="/produit/test" id="addProduct" class=" mt-0" method="post">
    @csrf
    
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
        
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                
                <div class="col-md-6 col-sm-12 " >
                    <x-generic.forms.form-table-line class="{{ $attributes['class'] }}">
                        <x-slot name="label">
                            <x-generic.forms.form-table-label  labelText="Image" :required="false" />
                        </x-slot>
                        <x-generic.input.photo id="photo" name="photo" url="" x="150" y="150"/>
                     </x-generic.forms.form-table-line>

                    <x-generic.forms.form-table render="voir">
                        <x-generic.forms.form-table-text name="libelle" labelText="Libelle Produit" required="true" placeholder="Renseigner le produit" id="libelle"/> 
                        <x-generic.forms.form-table-radios name="Categorie" labelText="Type Produit" required="true"  id="type"
                            :dt="['consomable'=>'Consommable','service'=>'Service']" value="consomable" /> 
                        <x-generic.forms.form-table-select name="categorie" labelText="Categorie Produit" required="true"  id="categorie"
                            :dt="['tous'=>'Tous','informatique'=>'Informatique']" value="informatique" />
                        
                        <x-generic.forms.form-table-multi-check name="va" labelText="Le Produit" required="true" type="switch"
                            :dt="['vendre'=>'Peut être vendu','acheter'=>'Peut être acheté']" :value="['vendre','acheter']" /> 
                        
                        {{-- <x-generic.forms.form-table-checkbox name="est_vendu" labelText="Est vendu" checked="true" placeholder="Nom Produit" id="est_vendu"/>  --}}
                    </x-generic.forms.form-table>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table>
                         
                        <x-generic.forms.form-table-text name="reference" labelText="Réference Interne"  placeholder="Réference interne" id="reference"/>
                        <x-generic.forms.form-table-text name="sku" labelText="SKU"  placeholder="code barre ou QR" id="sku"/>
                        <x-generic.forms.form-table-interval  name="prix_vente" labelText="Prix de Vente" id="prix_vente" type="interval" />
                        <x-generic.forms.form-table-interval  name="prix_achat" labelText="Prix d'achat" id="prix_achet" type="fixe" minValue="1" maxValue="3"/>
                        
                       

                    </x-generic.forms.form-table>
                </div>
                
            </div>
        </x-generic.navs-tabs.pane>

        <x-generic.navs-tabs.pane id="vente" active="true" >
            
        </x-generic.navs-tabs.pane>

        <x-generic.navs-tabs.pane id="achat" active="true" >
            
        </x-generic.navs-tabs.pane>
    </x-generic.navs-tabs.content>    
   
</form>
@endsection



@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce