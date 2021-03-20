

<form action="{{url('/vente/modif')}}" enctype="multipart/form-data" id="addProduct" class=" mt-0" method="post">
   @csrf

@section("ly-main-top")
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Vente" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Paiement" idPane="paiement" id="paiement-tab" />
    <x-generic.navs-tabs.item text="Livraison" idPane="livraison" id="livraison-tab"  />
    <x-generic.navs-tabs.item text="Détails Vente" idPane="detail" id="detail-tab"  />
</x-generic.navs-tabs.nav>
@endsection


   
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >     
      <x-generic.navs-tabs.pane id="general" active="true" >
         <div class="row d-flex justify-content-center ">
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
                           <x-generic.input.text  name="code" placeholder=""  id="nom" :value="$vente->client->nom" />                    
                        
                     </x-generic.forms.form-table-line>              
                     
                  </x-generic.forms.form-table >
                  <x-generic.forms.form-table >
                     <x-generic.forms.form-table-text name="date_vente" disposition="block"
                     labelText="Date et Heure de la vente"
                     :value="date('d-m-Y', strtotime($vente->created_at))"
                    id="date_vente"/>
                  </x-generic.forms.form-table >
               </div>
            @endif
            <div class="col-md-9 col-sm-12 d-flex justify-content-center">
               <x-generic.forms.form-table >
                  <x-generic.forms.form-table-item>
                     <x-generic.data-table.simple class="" name="myDataTable" :data="$ventes()" :columns="$titre()" dom="t"
                        idDivPaginate="bass-right" idDivInfo="bas-left" searchId='mySearch'/>
                  </x-generic.forms.form-table-item>
               </x-generic.forms.form-table>
            </div>
         </div> 
      </x-generic.navs-tabs.pane>

      <x-generic.navs-tabs.pane id="paiement" >
         <div class="row d-flex justify-content-center ">
               <div class="col-md-6 col-sm-12">
                  <x-generic.forms.form-table >
                     <x-generic.forms.form-table-item>
                        <x-generic.data-table.simple class="" name="myDataTable2" :data="$payements()" :columns="$titlePayement()" dom="t"
                           idDivPaginate="bass-right" idDivInfo="bas-left" searchId='mySearch'/>
                     </x-generic.forms.form-table-item>
                  </x-generic.forms.form-table>
               </div>     
               <div class="col-md-6 col-sm-12">
                  {{-- <x-generic.forms.form-table >
                     <x-generic.forms.form-table-item>
                        <x-generic.data-table.simple class="" name="myDataTable3" :data="$livraisons()" :columns="$titleLivraison()" dom="t"
                           idDivPaginate="bass-right" idDivInfo="bas-left" searchId='mySearch'/>
                     </x-generic.forms.form-table-item>
                  </x-generic.forms.form-table> --}}
               </div>



               <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                           Launch demo modal
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                           </div>
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