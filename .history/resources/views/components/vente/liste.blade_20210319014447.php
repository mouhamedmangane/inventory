
    
    <div class=" pt-2">
        <x-generic.data-table.simple name="myDataTable" url="{{ url('/vente/data/') }}" :columns="$getTitle()"
            idDivPaginate="bass-right" idDivInfo="bas-left" selectName="myDataTableSelect" searchId='mySearch'
            pageLength="10" 
            groupByEnable="true"
            groupBy="categorie"
            />
    </div>
