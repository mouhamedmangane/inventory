
    <div class=" pt-2">
        <x-generic.data-table.simple name="dataTable" url="{{ url('/vente/data/') }}" :columns="$getTitle()"
            idDivPaginate="bass-right" idDivInfo="bas-left" selectName="dateTable" searchId='mySearch'
            pageLength="7" />
    </div>
