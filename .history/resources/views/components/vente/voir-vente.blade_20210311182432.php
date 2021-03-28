
@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Générale" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Vente"  idPane="vente" id="vente-tab" />
    <x-generic.navs-tabs.item text="Achat" idPane="achat" id="achat-tab"  />
    <x-generic.navs-tabs.item text="Composants" idPane="composants" id="composants-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="{{url('/produit/save')}}" enctype="multipart/form-data" id="addProduct" class=" mt-0" method="post">
    @csrf
    
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >        
    

         <x-generic.navs-tabs.pane id="vente" >
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <x-generic.forms.form-table> 
                        <x-generic.forms.form-table-interval  name="prix_vente" labelText="$vente->client" id="prix_vente" type="fixe" minValue="1" maxValue="3"/> 
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
                  
                       
                </div>      
          
                
             
        </x-generic.navs-tabs.pane>

    </x-generic.navs-tabs.content>    

    <button type="submit">Envoyer</button>
   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce