<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
   
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12">
            <x-generic.forms.form-table >
                <x-generic.forms.form-table-select name="client" labelText="Selectionner Client " required="false"  id="client"
                :dt=""" value="default" />
            </x-generic.forms.form-table >
            </div>
            <div class="col-md-8 col-sm-12">
                <x-generic.forms.form-table >
                    <x-generic.forms.form-table-radios name="type" labelText="Livraison" required="true"  id="type"
                    :dt="['complet'=>'Complet','incomplet'=>'Incomplet']" value="complet" /> 
                </x-generic.forms.form-table >
            </div>
            <div class="col-md-8 col-sm-12">
                <x-generic.forms.form-table >
                    <div class="row">
                        <div class="col-md-6 col-sm-12 m-auto  ">
                             <x-generic.noppal-editor-table.table 
                                idTable='testEditor'
                                :dd="[]"
                                :columns="$getColumns()"/>
                        </div>
                           
                    </div>  
                </x-generic.forms.form-table >
            </div>
        </div>
    

    <button type="submit">Envoyer</button>
   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce