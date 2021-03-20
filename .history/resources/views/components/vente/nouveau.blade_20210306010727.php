<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
   
        <div class=" d-flex justify-content-center flex-unwrap" >
            
            <div class="col-md- col-sm-12">
                <x-generic.forms.form-table >
                    <x-generic.forms.form-table-select name="client" labelText="Selectionner Client " required="false"  id="client"
                    :dt="$clients" value="" />
                
                        <x-generic.forms.form-table-radios name="type" labelText="Livraison" required="true"  id="type"
                        :dt="['complet'=>'Complet','incomplet'=>'Incomplet']" value="complet" /> 
                        
                        <div class="row">
                            <x-generic.forms.form-table >
                                <x-generic.forms.form-table-item >
                            <div class="col-sm-12 w-100  " style="font-size: 12px;">
                                <x-generic.noppal-editor-table.table 
                                    idTable='d'
                                    :dd="[                                  
                                    ]"
                                    :columns="$getColumns()"/>
                            </div>   
                        </x-generic.forms.form-table-item >
                             </x-generic.forms.form-table >  
                            <div class="row">                                                         
                                <div class="col-md-5 col-sm-12 d-flex justify-content-right align-items-right">
                                    <x-generic.forms.form-table>                                                                         
                                        <x-generic.forms.form-table-text name="mtotal" labelText="Montant TOTAL"  placeholder="" id="nom"/> 
                                    </x-generic.forms.form-table>
                            
                                </div>  <div class="col-md-5 col-sm-12 d-flex justify-content-right align-items-right">
                                    <x-generic.forms.form-table> 
                                        <x-generic.forms.form-table-text name="mrecu" labelText="Montant Reçu"  placeholder="" id="nom"/>
                                    </x-generic.forms.form-table>
                           </div>
                            </div>  <div class="col-md-8 col-sm-12 d-flex justify-content-right align-items-right">
                                <x-generic.forms.form-table>                  
                                    <x-generic.forms.form-table-text name="Monnaie" labelText="Monnaie"  placeholder="" id="nom" style="border: red"/>
                                </x-generic.forms.form-table>
                        
                            </div>  
                            <div class="col-md-8 col-sm-12">
                                <x-generic.forms.form-table> 
                                    <x-generic.forms.form-table-interval  name="paiement" labelText="Paiement Vente" id="paiement" type="interval" minValue="1" maxValue="3"/> 
                                </x-generic.forms.form-table>                            
                            </div>
                </x-generic.forms.form-table >
            </div>
        </div>
    

  
   
</form>
@once
    @push('script')
    <script>
      $(function(){
          let editor =  $('#tableComposant').nplEditorTable();
          console.log(editor);
          editor.getColumn('produit').addEventInput('change',function(e){
              //alert('bonjour');
              let dataValueProduit = editor.getColumn('produit').getDataCell(e.rowIndex);
              let prix= dataValueProduit['prix'];
              editor.getColumn('prix').updateInput(e.rowIndex,prix);

          });
      });
    </script>
@endpush
@endonce