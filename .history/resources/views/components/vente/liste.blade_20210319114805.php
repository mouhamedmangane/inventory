
    

        <x-generic.data-table.simple 
            class="ly-list-table table-fixed"
            scrollY="100"
            name="myDataTable" url="{{ url('/vente/data/') }}" :columns="$getTitle()"
            idDivPaginate="bass-right" idDivInfo="bas-left" selectName="myDataTableSelect" searchId='mySearch'
            pageLength="100" 
            groupByEnable="true"
            groupBy="date"
        />

