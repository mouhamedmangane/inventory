<form action="{{url('/vente/save')}}" enctype="multipart/form-data" id="addVente" class=" mt-0" method="post">
    @csrf
    <x-generic.forms.form-table >
        <div class="row d-flex justify-content-center">
            <div class="col">
                            :dt="['default'=>'Non définis','informatique'=>'Informatiqughghe']" value="default" />
            </div>
        </div>
    <x-generic.forms.form-table >
   
   
</form>
@once
    @push('script')
        <script type="text/javascript">
        </script>
    @endpush
@endonce