<form action="/produit/save" id="addProduct" class=" mt-0" method="post">
    @csrf
    
    
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
        
        <x-generic.navs-tabs.pane id="general" active="true" >
            <div class="row">
                

                <div class="col-md-6 col-sm-12 " >
                    <x-generic.forms.form-table render="voir">
                        <x-generic.forms.form-table-text name="nom" labelText="Nom Produit" required="true" placeholder="Nom Produit" id="nom"/> 
                        <x-generic.forms.form-table-radios name="type" labelText="Type Produit" required="true"  id="type"
                            :dt="['consomable'=>'Consommable','service'=>'Service']" value="consomable" /> 
                        <x-generic.forms.form-table-select name="categorie" labelText="Categorie Produit" required="true"  id="categorie"
                            :dt="['tous'=>'Tous','informatique'=>'Informatiqughghe']" value="informatique" />
                        
                        <x-generic.forms.form-table-multi-check name="va" labelText="Le Produit" required="true" type="switch"
                            :dt="['vendre'=>'Peut être vendu','acheter'=>'Peut être acheté']" :value="['vendre','acheter']" /> 
                        <x-generic.forms.form-table-line class="{{ $attributes['class'] }}">

                                <x-slot name="label">
                                    <x-generic.forms.form-table-label  labelText="Image" :required="false" />
                                </x-slot>
                                <x-generic.input.photo id="photo" name="photo" url="" x="150" y="150"/>
                            
                        </x-generic.forms.form-table-line>
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