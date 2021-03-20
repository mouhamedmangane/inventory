<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
    <x-generic.forms.form-table >
        <div class="row d-flex justify-content-center">
            div.
        </div>
    <x-generic.forms.form-table >
   

    <button type="submit">Envoyer</button>
   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce