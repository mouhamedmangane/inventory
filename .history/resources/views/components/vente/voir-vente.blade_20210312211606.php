

<form action="{{url('/vente/modif')}}" enctype="multipart/form-data" id="addProduct" class=" mt-0" method="post">
   @csrf

<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Vente" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Paiement" idPane="paiement" id="paiement-tab" />
    <x-generic.navs-tabs.item text="Livraison" idPane="livraison" id="livraison-tab"  />
    <x-generic.navs-tabs.item text="Détails Vente" idPane="detail" id="detail-tab"  />
</x-generic.navs-tabs.nav>


   
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >     
      <x-generic.navs-tabs.pane id="general" active="true" >
         <div class="row">
            @if($vente->client)
               <div class="col-md-3 col-sm-6">
                  <x-generic.forms.form-table > 
                     <x-generic.forms.form-table-line  disposition="block">

                        <x-slot name="label">
                           <x-generic.forms.form-table-label  labelText="Client *  " required="false"  disposition="block" />
                        </x-slot>
                        
                        <div class="d-flex justify-content-center my-2">
                           <img src={{asset("images/produits/8.jpeg")}}
                                                width='75px'
                                                height='75px'
                                                class='rounded-circle' 
                                             > 
                        </div>                                
                        <x-generic.input.text  name="code" placeholder=""  id="code" :value="$vente->client->code" />                    
                        
                     </x-generic.forms.form-table-line>              
                     
                  </x-generic.forms.form-table >
               </div>
            @endif
            <div class="col-md-9 col-sm-12"></div>
         </div> 
      </x-generic.navs-tabs.pane>

      <x-generic.navs-tabs.pane id="paiement" >
         <div class="row">
               <div class="col-md-6 col-sm-12">
                  <x-generic.forms.form-table> 
                     <x-generic.forms.form-table-interval  name="prix_achat" labelText="Prix d'achat" id="prix_achat" type="fixe" minValue="1" maxValue="3"/> 
                  </x-generic.forms.form-table>
               </div>     
         </div>      
           
            
      </x-generic.navs-tabs.pane>
      <x-generic.navs-tabs.pane id="livraison" >
         <div class="row">

         </div>           
      </x-generic.navs-tabs.pane>
      <x-generic.navs-tabs.pane id="detail" >
            
         <div class="row">
           
                
         </div>      
   
         
      
      </x-generic.navs-tabs.pane>

    </x-generic.navs-tabs.content>    

   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce