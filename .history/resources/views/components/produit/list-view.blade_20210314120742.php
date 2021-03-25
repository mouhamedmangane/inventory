

@section('ly-main-content')
    <div class=" pt-2">
        <x-generic.data-table.simple name="myDataTable" url="{{ url('/produit/data/') }}" :columns="$columns()"
            idDivPaginate="bass-right" idDivInfo="bas-left" selectName="myDataTableSelect" searchId='mySearch'
            pageLength="10" />
    </div>
