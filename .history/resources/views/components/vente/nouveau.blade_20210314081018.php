<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
    <div class="d-flex justify-content-first flex-unwrap" >                 
            <div class="col-md-3 col-sm-12">

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
                            <x-generic.input.text  name="code" placeholder="Code Client"  id="code"/>                    
                            <x-generic.input.select  name="client"  placeholder="Nom du client" required="false"  id="client" class="mt-2"
                                :dt="$cl" value=""  />    
                        </x-generic.forms.form-table-line>              
                        
                    </x-generic.forms.form-table >
                 
               
               
                <x-generic.forms.form-table >                    
                    <x-generic.forms.form-table-text typpe="number" name="mrecu" disposition="block"
                                                    labelText="Montant Reçu"  
                                                    placeholder="Somme encaissée en FCFA" id="mrecu"/>
                </x-generic.forms.form-table>
                <x-generic.forms.form-table >                    
                    <x-generic.forms.form-table-textarea typpe="text" name="notes" disposition="block"
                                                    labelText="Notes "  
                                                    placeholder="Si vous avez des notes par rapport à cette vente" id="mrecu"/>
                </x-generic.forms.form-table>
            </div>

            <div class="col-md-9 col-sm-12">      
                        
                
                <x-generic.forms.form-table > 
                    <x-generic.forms.form-table-radios name="livraison" labelText="Livraison" required="true"  id="livraison"
                    :dt="['complet'=>'Complet','incomplet'=>'Incomplet']" value="complet" />             
                    <x-generic.forms.form-table-item  class="mt-0 pt-0">                        
                            <x-generic.noppal-editor-table.table 
                                        classTable=""
                                        classTh="border-top-0 border-bottom-0"
                                        idTable='d'
                                            id='ligne_vente'
                                        :dd="[                                  
                                        ]"
                                        :columns="$getColumns()"/>
                    </x-generic.forms.form-table-item >
                </x-generic.forms.form-table >  
                
               
                          
            </div>
        
         
    </div>

   <button name="" id="" class="btn btn-success " type="submit">Envoyer</button>
  
   
</form>




@once
    @push('script')
    <script>

        $(document).ready(function(){
           // $('#code').hide();
            $(function(){
                let editor =  $('#d').nplEditorTable();
                console.log(editor);
                editor.getColumn('produits').addEventInput('change',function(e){
                    //alert('bonjour');
                    let dataValueProduit = editor.getColumn('produits').getDataCell(e.rowIndex);              
                    let inputPrix= editor.getInput(e.rowIndex,'prix');
                    inputPrix.min=dataValueProduit['prixVenteMin'];
                    inputPrix.max=dataValueProduit['prixVenteMax'];
                    prix=inputPrix.min;
                    quantite=editor.getColumn('quantiteD').getDataCell(e.rowIndex);
                
                let unite=dataValueProduit['unite'];
              //  console.log("l'unite"+unite);
                    editor.getColumn('prix').updateInput(e.rowIndex,inputPrix.min);
                    editor.getColumn('unites').updateInput(e.rowIndex,unite);
                    editor.getColumn('montantT').updateInput(e.rowIndex,prix*quantite);
                    console.log(dataValueProduit);

                });

                $("#livraison-complet").click(function() {
                    let qD= editor.getColumn('quantiteD');
                    console.log('ld');
                
                });
                $('#client').on('change',function(e){
                    $('#code').val('Code Client'); 
                    $('#code').hide(); 

                   console.log( $('#compte').text(""));

                    console.log('fait');                   


                });
                $('#quant').on('change',function(e){
                   console.log( $('#compte').text(""));
                    console.log('fait');                   


                });
            });
                              
        });
    </script>
@endpush
@endonce