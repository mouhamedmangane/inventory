
    <form action="/ajustement/save" id="addProduct" class=" mt-0" method="post">
        @csrf
        <x-generic.navs-tabs.content id="myTabContent" class="px-4 py-3" >
            <x-generic.forms.form-table-item  class="mt-0 pt-0">
                <x-generic.noppal-editor-table.table
                            classTable=""
                            classTh="border-top-0 border-bottom-0"
                            idTable='d'
                            id='ligne_ajustement'
                            :dd="[
                            ]"
                            :columns="$getColumns()"/>
            </x-generic.forms.form-table-item >
        </x-generic.forms.form-table >


    </form>





    @once
    @push('script')
    <script>

        $(document).ready(function(){
           // $('#code').hide();
            $(function(){
                let editor =  $('#d').nplEditorTable();
               //console.log(editor);
                editor.getColumn('produits').addEventInput('change',function(e){
                    let dataValueProduit = editor.getColumn('produits').getDataCell(e.rowIndex);
                    let inputPrix= editor.getInput(e.rowIndex,'prix');
                    inputPrix.min=dataValueProduit['prixVenteMin'];
                    inputPrix.max=dataValueProduit['prixAchaeMax'];
                    prix=inputPrix.min;
                    editor.getColumn('prix').updateInput(e.rowIndex,inputPrix.min);
                    console.log(dataValueProduit);

                });

                $("#livraison-complet").click(function() {

            });

        });
    </script>
@endpush
@endonce
