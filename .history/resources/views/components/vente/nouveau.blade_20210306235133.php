<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
    <div class="d-flex justify-content-first flex-unwrap" >
        
            <div class="col-md-2 col-sm-6">
                    <img src={{asset("images/produits/0.png")}}
                            width='100px'
                            height='100px'
                            class='rounded-circle' 
                        >                
            </div>
            <div class="col-md-4 col-sm-6 p-2 mt-1 ">
                <x-generic.forms.form-table >
                    <x-generic.input.select  name="client"  placeholder="Nom du client" required="false"  id="client"
                    :dt="$clients" value=""  />  

                    <x-generic.forms.form-table-label labelText="Client N° : C0001" name="code"  placeholder="Nom du client" required="false"  id="client"
                 value=""  />  
                 <x-generic.forms.form-table-label labelText="Tel : 77 383 42 65" name="tel"  placeholder="Nom du client" required="false"  id="client"
                 value=""  />  
                </x-generic.forms.form-table >
            </div>
            <div class="col-md-4 col-sm-6 mt-1 ">
                <x-generic.forms.form-table >
                   
                 
                        
                </x-generic.forms.form-table >
            </div>
         
    </div>
        <div class=" d-flex justify-content-center flex-unwrap" >
            
            <div class="col-md-10 col-sm-12">
                <x-generic.forms.form-table >    
                    <x-generic.forms.form-table-radios name="type" labelText="Livraison" required="true"  id="type"
                    :dt="['complet'=>'Complet','incomplet'=>'Incomplet']" value="complet" /> 
                 </x-generic.forms.form-table >
                <x-generic.forms.form-table >
                  
                                
                    <x-generic.forms.form-table-item >
                       
                        <x-generic.noppal-editor-table.table 
                                    idTable='d'
                                    :dd="[                                  
                                    ]"
                                    :columns="$getColumns()"/>
                         </x-generic.forms.form-table-item >
                </x-generic.forms.form-table >  
                
                <x-generic.forms.form-table> 
                    <x-generic.forms.form-table-text name="mrecu" labelText="Montant Reçu"  placeholder="" id="mrecu"/>
                </x-generic.forms.form-table>
                          
            </div>
        </div>
    

  
   
</form>
@once
    @push('script')
    <script>
      $(function(){
            let editor =  $('#d').nplEditorTable();
            console.log(editor);
            editor.getColumn('produits').addEventInput('change',function(e){
                //alert('bonjour');
                let dataValueProduit = editor.getColumn('produits').getDataCell(e.rowIndex);              
                let inputPrix= editor.getInput(e.rowIndex,'prix');
                inputPrix.min=dataValueProduit['prixVenteMin'];
                inputPrix.max=dataValueProduit['prixVenteMax'];
            
               let unite=dataValueProduit['unite'];
               console.log("l'unite"+unite);
                editor.getColumn('prix').updateInput(e.rowIndex,inputPrix.min);
                editor.getColumn('unites').updateInput(e.rowIndex,unite);
                console.log(dataValueProduit);



            });
      });
    </script>
@endpush
@endonce