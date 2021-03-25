
    
    <div class=" pt-2">
        <x-generic.data-table.simple name="myDataTable" url="{{ url('/vente/data/') }}" :columns="$getTitle()"
            idDivPaginate="bas-right" idDivInfo="bas-left" selectName="myDataTableSelect" searchId='mySearch'
            pageLength="10" />
    </div>
