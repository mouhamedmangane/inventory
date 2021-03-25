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
                    <x-generic.input.text  name="code" placeholder="Code Client" required="true " id="mrecu"/>
                   
                    <x-generic.input.select  name="client"  placeholder="Nom du client" required="false"  id="client"
                    :dt="$cl" value=""  />  

                    
                 <x-generic.forms.form-table-label labelText="Tel : 77 383 42 65" name="tel"   required="false"  id="tel"
                 value=""  />  
                </x-generic.forms.form-table >
            </div>
            <div class="col-md-col-sm-6 m-4 d-flex justify-content-end">
                <x-generic.forms.form-table >
                   
                    <div id="divcompte">
                        ETAT COMPTE :   <label id='compte'> 15 000</label> <label class="badge badge-primary">FCFA</label>
                    </div>
                    
                </x-generic.forms.form-table >
            </div>
         
    </div>
        <div class=" d-flex justify-content-center flex-unwrap" >
            <div class="col-md-3">

                <x-generic.forms.form-table >    
                    <x-generic.forms.form-table-radios name="livraison" labelText="Livraison" required="true"  id="livraison"
                    :dt="['complet'=>'Complet','incomplet'=>'Incomplet']" value="complet" /> 
                

                 
                    <x-generic.forms.form-table-text typpe="number" name="mrecu" labelText="Montant Reçu" required="true    " placeholder="Somme encaissée en FCFA" id="mrecu"/>
                </x-generic.forms.form-table>
            </div>
            <div class="col-md-9 col-sm-12">                
                <x-generic.forms.form-table >                  
                    <x-generic.forms.form-table-item >                        
                            <x-generic.noppal-editor-table.table 
                                        idTable='d'
                                        :dd="[                                  
                                        ]"
                                        :columns="$getColumns()"/>
                    </x-generic.forms.form-table-item >
                </x-generic.forms.form-table >  
                
               
                          
            </div>
         
        </div>
    
   <button name="" id="" class="btn btn-success" type="submit">Envoyer</button>
  
   
</form>




@once
    @push('script')
    <script>

        $(document).ready(function(){
            $('#code').hide();
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