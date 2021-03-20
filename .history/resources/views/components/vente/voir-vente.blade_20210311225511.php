
 @section('ly-title')
 
<div class="d-flex align-items-center justify-content-between px-4 mt-1">
    <div class="d-flex align-items-center">
        <div class="rounded-circle border  text-align center d-flex align-items-center justify-content-center" 
             style="width: 43px; height: 43px; background: rgba(0,0,0,.1);"{{--@if ($attributes['img'])border-color:black!important;@endif"--}}> 
           {{-- @if ($attributes['img'])    ! --}}
           @if(false)
                <img src="{{ asset("images/profig.jpg") }}"  
                    width="43px"
                    height="43px"
                    class="rounded-circle" 
                    style=""
                >
            @else 
             <i class="material-icons">add_shopping_cart</i>
            @endif            
        </div>
    </div>
    
</div>
@endsection

@section('ly-main-top')
<x-generic.navs-tabs.nav id="myTab" class="px-2  ">
    <x-generic.navs-tabs.item text="Information Vente" idPane="general"  id="general-tab"  active="true" classLink="ml-3" />
    <x-generic.navs-tabs.item text="Paiement" idPane="paiement" id="vente-tab" />
    <x-generic.navs-tabs.item text="Livraison" idPane="livraison" id="achat-tab"  />
    <x-generic.navs-tabs.item text="Détails Vente" idPane="detail" id="composants-tab"  />
</x-generic.navs-tabs.nav>
@endsection

<form action="{{url('/vente/modif')}}" enctype="multipart/form-data" id="addProduct" class=" mt-0" method="post">
    @csrf
   
    <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >     
      <x-generic.navs-tabs.pane id="general" >
         <div class="row">
               <div class="col-md-6 col-sm-12">              
                  <x-generic.forms.form-table> 
                     <x-generic.forms.form-table-interval  name="prix_vente" labelText="" id="prix_vente" type="fixe" minValue="1" maxValue="3"/> 
                  </x-generic.forms.form-table>
               </div>                 
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

    <button type="submit">Envoyer</button>
   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce