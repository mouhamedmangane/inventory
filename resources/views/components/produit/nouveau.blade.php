


<x-generic.tool-bar.bar/>
<div class=" ">
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div  class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
            style="width: 50px; height: 50px; background: rgba(0,0,0,.1);@if (!$attributes['img'])border-color:black!important;@endif">
            @if ($attributes['img'])
                <img src="{{ asset("images/profig.jpg") }}"  
              width="100px"
              height="100px"
              class="rounded-circle" 
              style="">
            @else 
             <i class="material-icons">add_shopping_cart</i>
            @endif
            
        </div>
        <h5 class="my-4 ml-2">
            <span>Nouveau Article Simple</span>
            <i class="material-icons">arrow_drop_down</i>
        </h5>
    </div>
    <div class="">
        <x-generic.infos.info-list>
            <x-generic.infos.info-item title="Ratio Vente" value="3 100 / Mois" icon="equalizer" />
            <x-generic.infos.info-item title="Ratio Vente" value="2 100/ Mois" icon="trending_down" />
        </x-generic.infos.info-list>
    </div>
</div>

<form action="" class=" mt-4">
    <x-generic.navs-tabs.nav id="myTab" class=" mb-4 px-2">
        <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
        <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
        <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
    </x-generic.navs-tabs.nav>

    <x-generic.navs-tabs.content id="myTabContent" class="px-4">

        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                

                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table>
                        <x-generic.forms.form-table-text name="nom" labelText="Nom Produit" required="true" placeholder="Nom Produit" id="nom"/> 
                        <x-generic.forms.form-table-radios name="type" labelText="Type Produit" required="true"  id="type"
                            :dt="['consomable'=>'consommable','service'=>'service']" value="consomable" /> 
                        <x-generic.forms.form-table-select name="categorie" labelText="Categorie Produit" required="true"  id="categorie"
                            :dt="['tous'=>'Tous','informatique'=>'Informatiqughghe']" value="informatique" />
                        
                        <x-generic.forms.form-table-multi-check name="va" labelText="Le Produit" required="true" type="switch"
                            :dt="['vendre'=>'Peut être vendu','acheter'=>'Peut être acheté']" :value="['vendre','acheter']" /> 
                       
                        {{-- <x-generic.forms.form-table-checkbox name="est_vendu" labelText="Est vendu" checked="true" placeholder="Nom Produit" id="est_vendu"/>  --}}
                    </x-generic.forms.form-table>
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table>
                         
                        <x-generic.forms.form-table-text name="reference" labelText="Réference Interne"  placeholder="Réference interne" id="reference"/>
                        <x-generic.forms.form-table-text name="sku" labelText="SKU"  placeholder="code barre ou QR" id="sku"/>
                        <x-generic.forms.form-table-text name="prix_vente" labelText="Prix de Vente"  typpe="number" value="1" id="prix_vente"/>
                        
                        <x-generic.forms.form-table-line class="{{ $attributes['class'] }}">

                            <x-slot name="label">
                                <x-generic.forms.form-table-label  labelText="Image" :required="false" />
                            </x-slot>
                            <x-generic.input.photo id="photo" name="photo" url="" x="150" y="150"/>
                        
                        </x-generic.forms.form-table-line>

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

</div>

@once
    @push('script')
        <script type="text/javascript">

        </script>
    @endpush
@endonce