<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
   
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <x-generic.forms.form-table >
                <x-generic.forms.form-table-select name="client" labelText="Selectionner Client " required="false"  id="client"
                :dt="['default'=>'Non définis','informatique'=>'Informatiqughghe']" value="default" />
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