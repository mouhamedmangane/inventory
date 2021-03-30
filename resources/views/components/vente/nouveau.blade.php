<form action="{{url('/vente/save')}}" enctype="" id="addVente" class=" mt-0" method="post">
    @csrf
    <div class="d-flexflex-unwrap " >
            <div class="row  px-4 ">
                <div class="col-md-5">
                    <x-generic.forms.form-table >
                        <x-generic.forms.form-table-item  >


                            <div class="row d-flex justify-content-center ">
                                <div class="col-md-4 ">
                                    <div class="">
                                        <img src={{asset("images/produits/8.jpeg")}}
                                                            width='50px'
                                                            height='50px'
                                                            class='rounded-circle '
                                                        >
                                    </div>
                                    <x-generic.input.text  name="code" placeholder="Code Client" id="code"/>


                                </div>
                                <div class="col-md-8">
                                    <x-generic.input.select  name="client"  placeholder="Nom du client" required="false"  id="client" class=""
                                    :dt="$cl" value=""  />
                                    <x-generic.input.text  name="tel" placeholder="Téléphone" id="tel"/>
                                </div>
                            </div>

                        </x-generic.forms.form-table-item>

                    </x-generic.forms.form-table >
                </div>

                <div class="col-md-3">
                    <x-generic.forms.form-table >
                        <x-generic.forms.form-table-text typpe="number" name="mrecu" disposition="block"
                                                        labelText="Montant Reçu"
                                                        placeholder="Somme encaissée en FCFA" id="mrecu"/>
                    </x-generic.forms.form-table>
                </div>
                <div class="col-md-4">
                    <x-generic.forms.form-table >
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Notes</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                          </div>
                    </x-generic.forms.form-table>
                </div>

            </div>
            <div class="row px-4 d-flex justify-content-center">
                <div class="col-md-12 col-sm-12">


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
                    editor.getColumn('prix').updateInput(e.rowIndex,inputPrix.min);
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
:Z                     console.log( $('#compte').text(""));
                    console.log('fait');


                });
            });

        });
    </script>
@endpush
@endonce
