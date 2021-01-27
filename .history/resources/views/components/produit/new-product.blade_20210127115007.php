@extends('layouts.ly')

@section('ly-toolbar')
    <x-generic.tool-bar.bar />
@endsection

@section('ly-alert')
    <div class="" id="addProduitAlert" style="position: sticky;top:43px;border-radius:0px;"></div>
@endsection



@section('ly-title')
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div  class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 43px; height: 43px; background: rgba(0,0,0,.1);@if ($attributes['img'])border-color:black!important;@endif">
          @if ($attributes['img'])  {{--  ! --}}
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
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
    <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
    <x-generic.navs-tabs.item text="Composants" idPane="composants" id="composants-tab"  />
</x-generic.navs-tabs.nav>
@endsection


@section('ly-main-content')
<form action="{{url('/produit/save')}}" id="addProduct" class=" mt-0" method="post">
    @csrf
    
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
        
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                
                <div class="col-md-4 col-sm-12 " >
                    <x-generic.forms.form-table-line class="{{ $attributes['class'] }}">
                        <x-slot name="label">
                            <x-generic.forms.form-table-label  labelText="Image" :required="false" />
                        </x-slot>
                        <x-generic.input.photo id="photo" name="photo" url="" x="150" y="150"/>
                     </x-generic.forms.form-table-line>
                </div>
                <div class="col-md-8 col-sm-12 " >
                    <x-generic.forms.form-table >
                        <x-generic.forms.form-table-text name="libelle" labelText="Libelle Produit" required="true" placeholder="Renseigner le produit" id="libelle"/> 
                        <x-generic.forms.form-table-radios name="type" labelText="Type Produit" required="true"  id="type"
                            :dt="['consomable'=>'Consommable','service'=>'Service']" value="consomable" /> 
                        <x-generic.forms.form-table-select name="categorie" labelText="Categorie Produit" id="categorie"
                            :dt="$categories" value="" />                

                                                   
                    </x-generic.forms.form-table>
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-generic.forms.form-table >
                        <x-generic.forms.form-table-text typpe="number" name="qteStock" labelText="Quantité Stock " placeholder="quantité initial du produit" id="qteStock" step=0.01/> 
                        <x-generic.forms.form-table-text typpe="number" name="qteSeuil" labelText="Quantité Seuil "  placeholder="quantité minimal en stock" id="qteSeuil"  step=0.01/> 
                        <x-generic.forms.form-table-select name="unite" labelText="Unite | " required="true"  id="unite"
                            :dt="['kilo'=>'Kilogramme | kg','mesure1'=>'Mettre carré | m2','mesure2'=>'Mettre carré | m2','mesure'=>'Mettre carré | m2']" value="informatique" />

                    </x-generic.forms.form-table>                        
                </div>
            
                <div class="col-md-8 col-sm-12">
                    <x-generic.forms.form-table >
                        <x-generic.forms.form-table-multi-check name="achatable_vendable" labelText="Le Produit" required="true" type="switch"
                        :dt="['vendre'=>'Peut être vendu','acheter'=>'Peut être acheté']" :value="['vendre','acheter']" />
                        <x-generic.forms.form-table-text name="rI" labelText="Référence Interne " placeholder="Comment vous reconnez votre produit en interne" id="rI"/> 
                        <x-generic.forms.form-table-text name="code" labelText="Code " required="true" placeholder="code du produit" id="code"/> 
                    </x-generic.forms.form-table>
                        
                </div> 
                
               
                
            </div>
        </x-generic.navs-tabs.pane>

         <x-generic.navs-tabs.pane id="vente" >
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table> 
                        <x-generic.forms.form-table-interval  name="prix_vente" labelText="Prix de Vente" id="prix_vente" type="fixe" minValue="1" maxValue="3"/> 
                    </x-generic.forms.form-table>
                </div>     

                
            </div> 
        </x-generic.navs-tabs.pane>

        <x-generic.navs-tabs.pane id="achat" >
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table> 
                        <x-generic.forms.form-table-interval  name="prix_achat" labelText="Prix d'achat" id="prix_achat" type="fixe" minValue="1" maxValue="3"/> 
                    </x-generic.forms.form-table>
                </div>     
            </div>      
        </x-generic.navs-tabs.pane>
        <x-generic.navs-tabs.pane id="composants" >
            
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <table class="table table-light">
                        <tbody>
                            <tr>
                                <th>Produits</th>
                                <th>Quantité</th>
                                

                            </tr>
                            <tr>
                                <td>Machine à laver</td>
                                <td>5</td>               
                                

                            </tr>
                        </tbody>
                    </table>
                    </div>     
                </div>      
          
                
             
        </x-generic.navs-tabs.pane>

    </x-generic.navs-tabs.content>    

    <button type="submit">Envoyer</button>
   
</form>
@endsection



@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce